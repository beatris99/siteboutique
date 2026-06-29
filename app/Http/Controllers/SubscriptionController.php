<?php

namespace App\Http\Controllers;

use App\Mail\DiscountCodeMail;
use App\Models\Subscriber;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\View\View;

class SubscriptionController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'consent' => ['nullable'],
            'privacyAccepted' => ['nullable'],
            'locale' => ['nullable', 'in:ro,en'],
        ]);

        $hasConsent = $request->boolean('consent') || $request->boolean('privacyAccepted');

        if (! $hasConsent) {
            return response()->json([
                'message' => 'Acordul pentru emailuri este obligatoriu.',
                'errors' => [
                    'consent' => ['Acordul pentru emailuri este obligatoriu.'],
                ],
            ], 422);
        }

        $locale = $validated['locale']
            ?? session('locale')
            ?? app()->getLocale();

        if (! in_array($locale, ['ro', 'en'], true)) {
            $locale = 'ro';
        }

        $email = Str::lower(trim($validated['email']));

        $subscriber = Subscriber::firstOrNew([
            'email' => $email,
        ]);

        if (! $subscriber->exists) {
            $subscriber->fill([
                'locale' => $locale,
                'is_active' => true,
                'unsubscribe_token' => Str::random(48),
                'discount_code' => $this->generateUniqueDiscountCode(),
                'discount_percent' => 10,
                'discount_expires_at' => now()->addDays(14),
                'subscribed_at' => now(),
                'unsubscribed_at' => null,
            ]);
        } else {
            $subscriber->fill([
                'locale' => $locale,
                'is_active' => true,
                'unsubscribe_token' => $subscriber->unsubscribe_token ?: Str::random(48),
                'discount_code' => $subscriber->discount_code ?: $this->generateUniqueDiscountCode(),
                'discount_percent' => $subscriber->discount_percent ?: 10,
                'discount_expires_at' => $subscriber->discount_expires_at ?: now()->addDays(14),
                'subscribed_at' => $subscriber->subscribed_at ?: now(),
                'unsubscribed_at' => null,
            ]);
        }

        $subscriber->save();

        Mail::to($subscriber->email)
            ->locale($locale)
            ->send(new DiscountCodeMail($subscriber));

        return response()->json([
            'message' => $locale === 'en'
                ? 'You are subscribed. Your personal campaign code was sent by email.'
                : 'Te-ai abonat. Codul tău personal de campanie a fost trimis pe email.',
        ]);
    }

    public function unsubscribe(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'email' => ['required', 'email', 'max:255'],
        ]);

        $subscriber = Subscriber::where('email', Str::lower(trim($validated['email'])))->first();

        if ($subscriber) {
            $subscriber->update([
                'is_active' => false,
                'unsubscribed_at' => now(),
            ]);
        }

        return response()->json([
            'message' => 'Adresa a fost dezabonată, dacă exista în lista noastră.',
        ]);
    }

    public function unsubscribeByToken(Request $request, string $token): View
    {
        $locale = $request->query('locale');

        if (in_array($locale, ['ro', 'en'], true)) {
            app()->setLocale($locale);
        }

        $subscriber = Subscriber::where('unsubscribe_token', $token)->firstOrFail();

        $subscriber->update([
            'is_active' => false,
            'unsubscribed_at' => now(),
        ]);

        return view('newsletter.unsubscribed', [
            'subscriber' => $subscriber,
        ]);
    }

    private function generateUniqueDiscountCode(): string
    {
        do {
            $code = 'SG-' . Str::upper(Str::random(6));
        } while (Subscriber::where('discount_code', $code)->exists());

        return $code;
    }
}
