<?php

namespace App\Http\Controllers;

//use Mail;
use App\Http\Requests\ContactRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\Contact;

class ContactController extends Controller
{
    public function getForm()
    {
        return view('contact');
    }

    public function postForm(ContactRequest $request)
    {
        Mail::to('test@sebastiensenechal.com')
            ->send(new Contact($request->except('_token')));

        return view('confirm');
    }
}
