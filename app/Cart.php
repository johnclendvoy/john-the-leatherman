<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
	public static $tax_rate = 0.05;

	public static function remove($id)
	{
		session()->forget('cart.'.$id);
		if(empty(session('cart')))
		{
			session()->forget('cart');
		}
	}

	public static function add($id)
	{
		session()->push('cart.'.$id, $id);
	}

	public static function contains($id)
	{
		return !empty(session('cart')) && in_array($id, self::ids());
	}

	/**
	* returns an array of ids
	*/
	public static function ids()
	{
		return self::items()->pluck('id')->toArray();
	}

	/**
	* return a collection of the leather items in the cart
	* @return Collection of App\Leather items that have been added to the cart
	*/
	public static function items()
	{
		if(!empty(session('cart')))
		{
			return Leather::find(array_keys(session('cart')));
		}
		return collect([]);
	}

	public static function subtotal()
	{
		return number_format(self::items()->sum('price'), 2);
	}
	public static function subtotal_cents()
	{
		return floatval(self::subtotal()) * 100;
	}

	public static function tax()
	{
		return number_format(self::subtotal() * self::$tax_rate, 2);
	}
	public static function tax_cents()
	{
		return floatval(self::tax()) * 100;
	}

	public static function total()
	{
		return number_format(self::subtotal() * (1 + self::$tax_rate), 2);
	}
	public static function total_cents()
	{
		return floatval(self::total()) * 100;
	}

}
