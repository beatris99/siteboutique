<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Lang;

class DiscountCodeMail extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(public Subscriber $subscriber)
    {
    }

    public function build(): self
    {
        $locale = in_array($this->subscriber->locale, ['ro', 'en'], true)
            ? $this->subscriber->locale
            : app()->getLocale();

        return $this
            ->locale($locale)
            ->subject(Lang::get('emails.discount.subject', [
                'percent' => $this->subscriber->discount_percent ?? 10,
            ], $locale))
            ->view('emails.discount-code', [
                'subscriber' => $this->subscriber,
                'locale' => $locale,
            ]);
    }
}
