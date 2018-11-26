<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = ['g-recaptcha-response', 'shipped_at' , 'send_shipped_email'];
	protected $dates = ['created_at', 'updated_at', 'shipped_at'];

	// ATTRIBUTES 

	public function getUrlAttribute()
	{
		return url('orders/'.$this->id);
	}


	public function getSubtotalDollarsAttribute()
	{
		return number_format(($this->total - $this->tax) / 100, 2);
	}
	public function getTaxDollarsAttribute()
	{
		return number_format($this->tax / 100, 2);
	}
	public function getTotalDollarsAttribute()
	{
		return number_format($this->total / 100, 2);
	}

	public function leathers()
	{
		return $this->hasMany('App\Leather');
	}

}
