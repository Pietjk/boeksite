<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validateWithBag('form-feedback', [
            'name' => ['required', 'min:2', 'max:256'],
            'email' => ['required', 'email', 'min:2', 'max:256'],
            'subject' => ['required', 'min:2', 'max:256'],
            'text' => ['required', 'min:3'],
        ]);

        Mail::send('emails.contact', array(
            'body' => $validated['text'],
            'footer' => 'Deze email is gestuurd door ' . $validated['name'] .  ' met het e-mail adres ' . $validated['email'] . ' via www.rubenkorfmaker.nl',

        ), function($message) use ($validated){

            $message->from($validated['email']);

            $message->to('pkorfmaker@gmail.com', 'Piet')->subject($validated['subject']);
        });

        session()->flash('success', 'Uw mail is verstuurd!');

        return back();
    }
}
