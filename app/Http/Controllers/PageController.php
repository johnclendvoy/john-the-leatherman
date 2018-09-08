<?php

namespace App\Http\Controllers;

use App\Category;
use App\Color;
use App\Leather;

class PageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->only('dashboard', 'php');
    }

	public function php() 
	{
		dd(phpinfo());
	}

	public function home()
	{
		$category = []; //all
		$color = []; //all

		$categories = Category::all();
		$colors = Color::all();
		$leathers = Leather::all()->where('active', 1)->sortByDesc('id');

		return view('pages.home', compact('categories', 'leathers', 'colors'));
	}

	public function contact() 
	{
		return view('pages.contact');
	}
	public function email() 
	{
		// send mail
		Mail::to('johnclendvoy@gmail.com')->send(new ContactFormMail);

		// set sent
		$request->session()->put('sent', true);
		return view('pages.contact');
	}

	/** 
	* Admin Dashboard
	*/
	public function dashboard() 
	{
		$objects = [
			'leather',
			'categories',
			'colors',
			'messages',
		];
		return view('pages.dashboard', compact('objects'));
	}
}
