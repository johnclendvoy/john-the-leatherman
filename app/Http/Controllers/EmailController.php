<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Http\Requests\ContactFormRequest;

class EmailController extends Controller
{
	public function contact(ContactFormRequest $request)
	{
		Mail::to('johntheleatherman@gmail.com')->send(new ContactFormMail($request->all()));
		$request->session()->put('mail_sent', true);
		return back();
	}
}

