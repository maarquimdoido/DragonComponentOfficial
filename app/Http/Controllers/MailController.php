<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Verification;

class MailController extends Controller
{
    public function sendMail()
    {
        $name = Auth::user()->name;
        Mail::to('mv_bcardoso@outlook.com')->send(new Verification($name));
        return view('Mail.verification');
    }
}
