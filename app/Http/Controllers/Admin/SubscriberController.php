<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\DiscountCodeMail;
use App\Models\Subscriber;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\StreamedResponse;
use Throwable;

class SubscriberController extends Controller
{
    public function index(Request $request): View
    {
        $subscribers = $this->filteredQuery($request)
            ->orderByDesc('last_requested_at')
            ->orderByDesc('id')
            ->paginate(25)
            ->withQueryString();

        $stats = [
            'total' => Subscriber::query()->count(),
            'valid' => Subscriber::query()
                ->where('is_active', true)
                ->whereNull('unsubscribed_at')
                ->whereNull('used_at')
                ->where(function (Builder $query): void {
                    $query->whereNull('discount_expires_at')
                        ->orWhere('discount_expires_at', '>', now());
                })
                ->count(),
            'used' => Subscriber::query()
                ->whereNotNull('used_at')
                ->count(),
            'expired' => Subscriber::query()
                ->whereNull('used_at')
                ->whereNotNull('discount_expires_at')
                ->where('discount_expires_at', '<=', now())
                ->count(),
            'unsubscribed' => Subscriber::query()
                ->where(function (Builder $query): void {
                    $query->where('is_active', false)
                        ->orWhereNotNull('unsubscribed_at');
                })
                ->count(),
        ];

        return view(
            'admin.subscribers.index',
            compact('subscribers', 'stats')
        );
    }

    public function export(Request $request): StreamedResponse
    {
        $query = $this->filteredQuery($request);
        $filename = trans('admin.subscribers.csv_filename', [
            'date' => now()->format('Y-m-d-His'),
        ]);

        return response()->streamDownload(
            function () use ($query): void {
                $output = fopen('php://output', 'wb');

                fwrite($output, "\xEF\xBB\xBF");
                fputcsv($output, [
                    trans('admin.subscribers.table.email'),
                    trans('admin.subscribers.table.code'),
                    trans('admin.subscribers.table.discount'),
                    trans('admin.subscribers.table.status'),
                    trans('admin.subscribers.table.requests'),
                    trans('admin.subscribers.table.last_request'),
                    trans('admin.subscribers.table.expires_at'),
                    trans('admin.subscribers.table.used_at'),
                    trans('admin.subscribers.table.source_page'),
                    trans('admin.subscribers.table.consent_at'),
                    trans('admin.subscribers.table.last_sent_at'),
                    trans('admin.subscribers.table.created_at'),
                ], ';');

                $query
                    ->orderBy('id')
                    ->chunkById(
                        500,
                        function ($subscribers) use ($output): void {
                            foreach ($subscribers as $subscriber) {
                                fputcsv($output, [
                                    $subscriber->email,
                                    $subscriber->discount_code,
                                    $subscriber->discount_percent,
                                    $this->statusLabel($subscriber),
                                    $subscriber->request_count,
                                    $subscriber->last_requested_at?->format('d.m.Y H:i'),
                                    $subscriber->discount_expires_at?->format('d.m.Y H:i'),
                                    $subscriber->used_at?->format('d.m.Y H:i'),
                                    $subscriber->source_page,
                                    $subscriber->privacy_accepted_at?->format('d.m.Y H:i'),
                                    $subscriber->last_sent_at?->format('d.m.Y H:i'),
                                    $subscriber->created_at?->format('d.m.Y H:i'),
                                ], ';');
                            }
                        }
                    );

                fclose($output);
            },
            $filename,
            [
                'Content-Type' =>
                'text/csv; charset=UTF-8',
            ]
        );
    }

    public function markUsed(
        Subscriber $subscriber
    ): RedirectResponse {
        $subscriber->update([
            'used_at' => now(),
        ]);

        return back()->with(
            'success',
            trans('admin.subscribers.flash.marked_used')
        );
    }

    public function markUnused(
        Subscriber $subscriber
    ): RedirectResponse {
        $subscriber->update([
            'used_at' => null,
        ]);

        return back()->with(
            'success',
            trans('admin.subscribers.flash.marked_unused')
        );
    }

    public function resend(
        Subscriber $subscriber
    ): RedirectResponse {
        if (! $subscriber->hasValidDiscountCode()) {
            return back()->with(
                'error',
                trans('admin.subscribers.flash.invalid_code')
            );
        }

        $locale = in_array(
            $subscriber->locale,
            ['ro', 'en'],
            true
        ) ? $subscriber->locale : 'ro';

        try {
            Mail::to($subscriber->email)
                ->locale($locale)
                ->send(
                    new DiscountCodeMail(
                        $subscriber,
                        $locale
                    )
                );

            $subscriber->forceFill([
                'last_sent_at' => now(),
            ])->save();
        } catch (Throwable $exception) {
            Log::error(
                'SiteGo discount email could not be resent.',
                [
                    'subscriber_id' => $subscriber->id,
                    'email' => $subscriber->email,
                    'exception' => $exception->getMessage(),
                ]
            );

            return back()->with(
                'error',
                trans('admin.subscribers.flash.resend_failed')
            );
        }

        return back()->with(
            'success',
            trans('admin.subscribers.flash.resent', [
                'email' => $subscriber->email,
            ])
        );
    }

    private function filteredQuery(
        Request $request
    ): Builder {
        $query = Subscriber::query();
        $search = trim((string) $request->query(
            'search',
            ''
        ));
        $status = (string) $request->query(
            'status',
            'all'
        );

        if ($search !== '') {
            $query->where(
                function (Builder $builder) use ($search): void {
                    $builder
                        ->where(
                            'email',
                            'like',
                            '%' . $search . '%'
                        )
                        ->orWhere(
                            'discount_code',
                            'like',
                            '%' . strtoupper($search) . '%'
                        )
                        ->orWhere(
                            'source_page',
                            'like',
                            '%' . $search . '%'
                        );
                }
            );
        }

        if ($status === 'valid') {
            $query
                ->where('is_active', true)
                ->whereNull('unsubscribed_at')
                ->whereNull('used_at')
                ->where(function (Builder $builder): void {
                    $builder->whereNull('discount_expires_at')
                        ->orWhere('discount_expires_at', '>', now());
                });
        }

        if ($status === 'used') {
            $query->whereNotNull('used_at');
        }

        if ($status === 'expired') {
            $query
                ->whereNull('used_at')
                ->whereNotNull('discount_expires_at')
                ->where('discount_expires_at', '<=', now());
        }

        if ($status === 'unsubscribed') {
            $query->where(function (Builder $builder): void {
                $builder->where('is_active', false)
                    ->orWhereNotNull('unsubscribed_at');
            });
        }

        return $query;
    }

    private function statusLabel(
        Subscriber $subscriber
    ): string {
        return trans(
            'admin.subscribers.status.' .
                $subscriber->campaignStatus()
        );
    }
}
