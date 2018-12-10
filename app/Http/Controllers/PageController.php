<?php

namespace App\Http\Controllers;

use App\Color;
use App\Leather;
use App\Category;

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
		// $categories = Category::all();
		// $colors = Color::all();

		// featured leather
		$feature_title = 'Featured Wallets';
		$wallet_category = Category::where('slug', 'wallets')->first();
		$leathers = Leather::where('active', 1)->where('available', 1)->where('category_id', $wallet_category->id)->inRandomOrder()->get()->take(4);

		return view('pages.home', compact('leathers', 'feature_title'));
	}

	/** 
	* Admin Dashboard
	*/
	public function dashboard() 
	{
		return view('pages.dashboard', compact('objects'));
	}
}
