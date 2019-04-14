<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Leather;
use Illuminate\Http\Request;

class CartController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->except(['index', 'store', 'destroy']);
    }	

	public function index()
	{
		return view('cart.index');
	}

	// add an item to the cart, or if it is already there, remove it.
	public function store(Request $request)
	{
		$leather_id = $request->leather_id;

		if(Cart::contains($leather_id))
		{
			Cart::remove($leather_id);
		}
		else
		{
			Cart::add($leather_id);
		}
		return redirect('/bag');
	}
}
