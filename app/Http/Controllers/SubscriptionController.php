<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Mail\DiscountCodeMail;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;
use Throwable;

class SubscriptionController extends Controller
{
    public function store(
        StoreSubscriberRequest $request
    ): JsonResponse {
        $validated = $request->validated();
        $email = Str::lower(trim($validated['email']));
        $locale = $this->resolveLocale(
            $validated['locale'] ?? null
        );

        $subscriber = Subscriber::firstOrNew([
            'email' => $email,
        ]);

        $needsNewCode =
            ! $subscriber->exists ||
            ! $subscriber->discount_code ||
            $subscriber->used_at !== null ||
            ($subscriber->discount_expires_at?->isPast() ?? false);

        if ($needsNewCode) {
            $subscriber->discount_code =
                Subscriber::generateUniqueDiscountCode();
            $subscriber->discount_percent = 10;
            $subscriber->discount_expires_at =
                now()->addDays(14);
            $subscriber->used_at = null;
        } else {
            $subscriber->discount_percent =
                $subscriber->discount_percent ?: 10;
            $subscriber->discount_expires_at =
                $subscriber->discount_expires_at ?: now()->addDays(14);
        }

        $sourcePage =
            $validated['sourcePage'] ??
            $request->headers->get('referer') ??
            '/';

        $subscriber->email = $email;
        $subscriber->locale = $locale;
        $subscriber->is_active = true;
        $subscriber->subscribed_at =
            $subscriber->subscribed_at ?: now();
        $subscriber->unsubscribe_token =
            $subscriber->unsubscribe_token ?:
            Subscriber::generateUniqueUnsubscribeToken();
        $subscriber->unsubscribed_at = null;
        $subscriber->privacy_accepted_at = now();
        $subscriber->last_requested_at = now();
        $subscriber->request_count =
            ((int) $subscriber->request_count) + 1;
        $subscriber->source_page = Str::limit(
            (string) $sourcePage,
            255,
            ''
        );
        $subscriber->save();

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
                'SiteGo discount email could not be sent.',
                [
                    'subscriber_id' => $subscriber->id,
                    'email' => $subscriber->email,
                    'exception' => $exception->getMessage(),
                ]
            );

            return response()->json([
                'message' => Lang::get(
                    'newsletter.api.mail_failed',
                    [],
                    $locale
                ),
            ], 503);
        }

        return response()->json([
            'message' => Lang::get(
                'newsletter.api.discount_sent',
                [
                    'percent' =>
                    $subscriber->discount_percent ?? 10,
                ],
                $locale
            ),
        ]);
    }

    public function unsubscribe(Request $request): JsonResponse
    {
        $locale = $this->resolveLocale(
            $request->input('locale')
        );

        $validated = $request->validate([
            'email' => [
                'required',
                'email',
                'max:255',
            ],
        ], [
            'email.required' => Lang::get(
                'newsletter.validation.email_required',
                [],
                $locale
            ),
            'email.email' => Lang::get(
                'newsletter.validation.email_invalid',
                [],
                $locale
            ),
        ]);

        $subscriber = Subscriber::query()
            ->where(
                'email',
                Str::lower(trim($validated['email']))
            )
            ->first();

        if ($subscriber) {
            $subscriber->update([
                'is_active' => false,
                'unsubscribed_at' => now(),
            ]);
        }

        return response()->json([
            'message' => Lang::get(
                'newsletter.api.unsubscribed',
                [],
                $locale
            ),
        ]);
    }

    public function unsubscribeByToken(
        Request $request,
        string $token
    ): View {
        $locale = $this->resolveLocale(
            $request->query('locale')
        );

        app()->setLocale($locale);

        $subscriber = Subscriber::query()
            ->where('unsubscribe_token', $token)
            ->firstOrFail();

        $subscriber->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
        ]);

        return view('newsletter-unsubscribed', [
            'subscriber' => $subscriber,
        ]);
    }

    private function resolveLocale(
        mixed $locale = null
    ): string {
        $resolved = (string) (
            $locale ??
            session('locale') ??
            app()->getLocale()
        );

        return in_array($resolved, ['ro', 'en'], true)
            ? $resolved
            : 'ro';
    }
}
