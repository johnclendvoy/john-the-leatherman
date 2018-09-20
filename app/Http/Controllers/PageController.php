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
		// TODO make this a new page with featured items/ banner images etc

		$category = null; //all
		$color = null; //all
		$available = null; //all
		$leather = null;

		$categories = Category::all();
		$colors = Color::all();
		$leathers = Leather::all()->where('active', 1)->sortByDesc('id');

		return view('pages.home', compact('categories', 'leathers', 'colors', 'category', 'color', 'available', 'leather'));
	}

	/** 
	* Admin Dashboard
	*/
	public function dashboard() 
	{
		return view('pages.dashboard', compact('objects'));
	}
}
