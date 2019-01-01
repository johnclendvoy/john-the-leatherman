<?php

namespace App\Http\Controllers;

use Mail;
use App\Suggestion;
use Illuminate\Http\Request;
use App\Mail\SuggestionFormMail;
use App\Http\Requests\SuggestionFormRequest;

class SuggestionController extends Controller
{
	public function store(SuggestionFormRequest $request)
	{
		$suggestion = Suggestion::create($request->all());
		Mail::to('johntheleatherman@gmail.com')->send(new SuggestionFormMail($request->all()));
		session()->put('sent_suggestion', true);
		return back();
	}
}
