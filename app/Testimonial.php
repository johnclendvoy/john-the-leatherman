<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
	protected $guarded = [];

	// Scopes

	public function scopeActive($q)
	{
		return $q->where('active', 1);
	}

	// Relations

	public function leather()
	{
		return $this->belongsTo('App\Leather');
	}
}
