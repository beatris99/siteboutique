<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactFormRequest;
use App\Mail\ContactRequestReceived;
use App\Models\ContactRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(ContactFormRequest $request)
    {
        $data = $request->validated();

        if ($request->filled('website')) {
            return back()->with('success', __('site.contact.success'));
        }

        $startedAt = Carbon::createFromTimestamp((int) $data['form_started_at']);

        if ($startedAt->diffInSeconds(now()) < 3) {
            return back()->with('success', __('site.contact.success'));
        }

        unset(
            $data['website'],
            $data['form_started_at'],
            $data['privacy_accepted']
        );

        $data['source'] = 'website';

        $contactRequest = ContactRequest::create($data);

        try {
            Mail::to(config('rentride.notification_email'))
                ->send(new ContactRequestReceived($contactRequest));
        } catch (\Throwable $exception) {
            Log::error('RentRide contact notification email failed', [
                'contact_request_id' => $contactRequest->id,
                'message' => $exception->getMessage(),
            ]);
        }

        return back()->with('success', __('site.contact.success'));
    }
}
