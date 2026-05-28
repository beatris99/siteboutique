<?php

namespace App\Mail;

use App\Models\ContactRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactRequestReceived extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct(
        public ContactRequest $contactRequest
    ) {
    }

    public function build(): self
    {
        return $this
            ->subject('Cerere nouă RentRide - ' . $this->contactRequest->name)
            ->view('emails.contact-request-received');
    }
}
