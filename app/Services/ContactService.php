<?php

namespace App\Services;

use App\Http\Requests\ContactStoreRequest;
use App\Mail\ContactSendMail;
use App\Models\Contact;
use Illuminate\Support\Facades\Mail;

class ContactService
{
    public function sendMail($contact)
    {
        Mail::to('myblogcodeactivation@gmail.com')->send(
            new ContactSendMail($contact)
        );
    }

    public function add($request)
    {
        $contact = new Contact();

        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject = $request->subject;
        $contact->text = $request->text;

        $contact->save();

        return $contact;
    }

}
