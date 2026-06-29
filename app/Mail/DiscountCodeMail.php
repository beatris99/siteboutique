<?php

namespace App\Mail;

use App\Models\Subscriber;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class DiscountCodeMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Subscriber $subscriber)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('Codul tău de 10% - SiteGo')
            ->replyTo(config('admin.username'))
            ->view('emails.discount-code');
    }
}
