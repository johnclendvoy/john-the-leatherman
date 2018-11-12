<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Http\Requests\ShippingDetailsFormRequest;

class ShippingDetailsController extends Controller
{
	public function create()
	{
		if(Cart::items()->count())
		{
			return view('shipping-details.create');
		}
		else
		{
			return redirect('/bag');
		}
	}

	public function store(ShippingDetailsFormRequest $request)
	{
		session()->put('customer', [
			'name' => $request->name,
			'email' => $request->email,
			'address' => $request->address,
			'city' => $request->city,
			'postal_code' => $request->postal_code,
			'phone' => $request->phone,
			'notes' => $request->notes,
		]);
		return redirect('/orders/create');
	}
}
