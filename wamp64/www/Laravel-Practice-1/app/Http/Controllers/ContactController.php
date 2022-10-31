<?php

namespace App\Http\Controllers;

class ContactController
{
    public function contact()
    {
        return view('contact.contact', ['cssName' => 'contact', 'title' => 'Contact us']);
    }

    public function messages()
    {
        return view('contact.contact', ['cssName' => 'contact', 'title' => 'Contact us']);
    }
}
