<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactRequest;

class ContactRequestController extends Controller
{
    public function index()
    {
        $contactRequests = ContactRequest::latest()->paginate(30);

        return view('admin.contact_requests.index', compact('contactRequests'));
    }

    public function destroy(ContactRequest $contactRequest)
    {
        $contactRequest->delete();

        return redirect()
            ->route('admin.contact_requests.index')
            ->with('success', 'Cererea a fost ștearsă.');
    }
}
