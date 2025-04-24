<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use App\Models\Contact; 

class MailController extends Controller
{
    //

    public function sendContactMail(Request $request)
    {
        // Validate request
        $validated = $request->validate([
            'name' => 'required|string|min:1',
            'email' => 'required|email',
            'message' => 'required|string',
            'purpose' => 'required|in:issue,getintouch',
            'issue_description' => 'nullable|string',
            'contacting_from' => 'required_if:purpose,issue|in:individual,company',
            'company_name' => 'required_if:contacting_from,company|string|nullable',
        ]);

        // Save to database
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'message' => $validated['message'],
            'purpose' => $validated['purpose'],
            'issue_description' => $validated['issue_description'] ?? null,
            'contacting_from' => $validated['contacting_from'] ?? null,
            'company_name' => $validated['company_name'] ?? null,
        ]);

        // Send email to user
        Mail::to($validated['email'])->send(new ContactFormMail($validated));

        return redirect()->back()->withSuccess('Submission successful! We’ll be in touch shortly!');
    }

}