<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create(Request $req)
    {

        /**
         * Custom Error Messages
         */
        $custom_error_messages = [
            'full_name.required' => 'Name is required',
            'full_name.min' => 'Name Must Include Atleast Three Characters',
            'phone_no.required' => 'Phone No Must Not Be Empty',
            'email.required' => 'Email is required',
            'message.required' => 'Message Cannot Be Empty',
        ];

        $formFields =  $req->validate([
            'full_name' => 'required|string|min:3',
            'email' => 'required|string|email|max:255',
            'phone_no' => 'required|string',
            'message' => 'required|string|max:255',
        ], $custom_error_messages);

        $addData = Contact::create($formFields);

        return redirect('/contact')->with('form-success', 'We Will Contact You Soon');
    }
}