<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Brian2694\Toastr\Facades\Toastr;
use App\Notifications\MessageSend;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function send(Request $request) {
        $this->validate($request, [

            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
        ]);

        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->subject =  $request->subject;
        $contact->message = $request->message;
        $contact->status = 'new';
        Notification::route('mail', $contact->email)
        ->notify(new MessageSend());
        $contact->save();
        Toastr::success('Message sent successfully.','Success',["positionClass" => "toast-top-right"]);
        return redirect()->back();
    }
}
