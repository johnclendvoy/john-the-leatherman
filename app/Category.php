<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

	protected $fillable = ['name', 'slug'];

	public function leathers()
	{
		return $this->hasMany('App\Leather')->where('active', 1)->orderBy('id', 'desc');
	}
}
