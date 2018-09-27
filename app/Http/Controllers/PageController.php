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

		$categories = Category::all();
		$colors = Color::all();

		// featured leather
		$feature_title = 'Featured Slim Wallets';
		$wallet_category = Category::where('slug', 'wallets')->first();
		$leathers = Leather::where('active', 1)->where('available', 1)->where('category_id', $wallet_category->id)->orderBy('id')->get();
		return view('pages.home', compact('categories', 'leathers', 'colors', 'feature_title'));
	}

	/** 
	* Admin Dashboard
	*/
	public function dashboard() 
	{
		return view('pages.dashboard', compact('objects'));
	}
}
