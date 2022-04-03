<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() { 
        return view('contact');
    }

    public function contact(ContactRequest $request) {
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'phone_number' => $request->phone_number,
            'message' => $request->message,
        ]);
        //send mail den nguoi gui
        //send mail to QA & Admin
        return redirect()->back()->with(['class' => 'danger', 'message' => 'Thank you for contact us!']);
    }
}
