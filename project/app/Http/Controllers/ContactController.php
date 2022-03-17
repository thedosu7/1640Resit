<?php

namespace App\Http\Controllers;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\User;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(ContactRequest $request) { 
        
        $user = User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('success', 'Email not found in system');
        } 
        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        //send mail den nguoi gui
        //send mail to QA & Admin

        return redirect()->back()->with('success', 'Thank you for contact us!');
        

    }
}
