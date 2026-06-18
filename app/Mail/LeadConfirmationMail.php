<?php

namespace App\Mail;

use App\Models\Lead;
use App\Support\TemplateRequirementResolver;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LeadConfirmationMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('Am primit cererea ta - SiteGo')
            ->replyTo(config('admin.email'))
            ->view('emails.leads.confirmation')
            ->with([
                'requirements' => TemplateRequirementResolver::requirements($this->lead),
            ]);
    }
}
