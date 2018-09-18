<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $guarded = [];

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
