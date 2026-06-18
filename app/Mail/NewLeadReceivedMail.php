<?php

namespace App\Mail;

use App\Models\Lead;
use App\Support\TemplateRequirementResolver;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewLeadReceivedMail extends Mailable
{
    use Queueable;
    use SerializesModels;

    public function __construct(public Lead $lead)
    {
    }

    public function build(): self
    {
        return $this
            ->subject('Cerere nouă SiteGo - ' . $this->lead->name)
            ->view('emails.leads.new')
            ->with([
                'requirements' => TemplateRequirementResolver::requirements($this->lead),
            ]);
    }
}
