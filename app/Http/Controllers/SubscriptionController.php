<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriberRequest;
use App\Http\Requests\UnsubscribeSubscriberRequest;
use App\Mail\DiscountCodeMail;
use App\Models\Subscriber;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Throwable;

class SubscriptionController extends Controller
{
    public function store(StoreSubscriberRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $email = strtolower(trim($validated['email']));

        $subscriber = Subscriber::firstOrNew(['email' => $email]);

        if (! $subscriber->exists) {
            $subscriber->discount_code = Subscriber::generateUniqueCode();
            $subscriber->discount_percent = 10;
        }

        if (! $subscriber->unsubscribe_token) {
            $subscriber->unsubscribe_token = Subscriber::generateUniqueUnsubscribeToken();
        }

        $subscriber->source_page = $validated['sourcePage'] ?? $subscriber->source_page;
        $subscriber->privacy_accepted_at = now();
        $subscriber->unsubscribed_at = null;
        $subscriber->save();

        try {
            Mail::to($subscriber->email)->send(new DiscountCodeMail($subscriber));

            $subscriber->forceFill([
                'last_sent_at' => now(),
            ])->saveQuietly();
        } catch (Throwable $exception) {
            Log::error('Newsletter subscription email could not be sent.', [
                'subscriber_id' => $subscriber->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return response()->json([
            'status' => 'subscribed',
            'message' => 'Abonarea a fost salvată. Dacă emailul este corect, vei primi mesajul nostru în inbox.',
        ]);
    }

    public function unsubscribe(UnsubscribeSubscriberRequest $request): JsonResponse
    {
        $validated = $request->validated();
        $email = strtolower(trim($validated['email']));

        $subscriber = Subscriber::where('email', $email)->first();

        if ($subscriber) {
            $subscriber->forceFill([
                'unsubscribed_at' => now(),
            ])->save();
        }

        // Privacy-safe response: same message even if the email was not found.
        return response()->json([
            'status' => 'unsubscribed',
            'message' => 'Dacă adresa există în listă, a fost dezabonată.',
        ]);
    }

    public function unsubscribeByToken(string $token): View
    {
        $subscriber = Subscriber::where('unsubscribe_token', $token)->firstOrFail();

        $subscriber->forceFill([
            'unsubscribed_at' => now(),
        ])->save();

        return view('newsletter-unsubscribed', [
            'subscriber' => $subscriber,
        ]);
    }
}
