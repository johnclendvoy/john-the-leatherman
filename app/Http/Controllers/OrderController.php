<?php

namespace App\Http\Controllers;

use Mail;
use Cart;
use App\Order;
use Illuminate\Http\Request;
use App\Mail\OrderCreatedEmail;
use App\Mail\OrderConfirmationEmail;
use App\Http\Requests\OrderFormRequest;

class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except('create', 'store', 'thankYou');
	}

	public function admin()
	{
		$orders = Order::all();
		return view('orders.admin', compact('orders'));
	}

	public function create()
	{
		return view('orders.create');
	}

	public function store(OrderFormRequest $request)
	{
		// try {
			// calculate total for the current cart
			$total_cents = Cart::total_cents();

			$description = 'Order from ' .session('customer.name').' ('. session('customer.email'). ') at ' . date('Y-m-d H:i:s') . '. Items: '. implode(',', Cart::ids());

			// charge the card
			\Stripe\Stripe::setApiKey(config('services.stripe.secret'));
			\Stripe\Charge::create([
			  "amount" => $total_cents,
			  "currency" => "cad",
			  "source" => $request->stripeToken, // obtained with Stripe.js
			  "description" => $description,
			]);

			// find the stripe charge id
			$stripe_id = '1235';

			// find the stripe fee
			$stripe_fee = '123';

			// create the order object
			$order = Order::create([
				'total' => $total_cents,
				'tax' => Cart::tax_cents(),
				'name' => session('customer.name'),
				'email' => session('customer.email'),
				'address' => session('customer.address'),
				'phone' => session('customer.phone'),
				'notes' => session('customer.notes'),
				'stripe_fee' => $stripe_fee,
				'stripe_id' => $stripe_id,
			]);

			$order->leathers()->saveMany(Cart::items());

			Mail::send(new OrderConfirmationEmail($order));
			Mail::send(new OrderCreatedEmail($order));

			Cart::items()->each(function($leather){
				$leather->available = 0;
				$leather->save();
			});

			session()->forget('cart');

			// redirect to thank you message
			return redirect('/thank-you');
		// }
		// catch(\Exception $e)
		// {
		// 	return back()->withErrors(['failed_payment' => $e->getMessage()]);
		// }
	}

	public function thankYou()
	{
		return view('orders.thank-you');
	}
}
