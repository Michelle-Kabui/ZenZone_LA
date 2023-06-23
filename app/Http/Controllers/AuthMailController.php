<?php

namespace App\Http\Controllers;

use Mail;
use App\Mail\AuthMail;
use Illuminate\Http\Request;


class AuthMailController extends Controller
{
    public function send_email()
    {
        $mailData = [
            'title' => 'Welcome To ZenZone.com',
            'body' => 'This is for testing email using smtp.'
        ];

        
        Mail::to('davengahu007@gmail.com')->send(new AuthMail($mailData));
           
        dd("Email is sent successfully.");
    }
    //
}
