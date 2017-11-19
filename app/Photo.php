<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
	protected $guarded = [];

	// ATTRIBUTES

	public function image($size)
	{
		$object = $this->photoable->class;
		return '/uploads/images/' .$object. '/' . $size.'/'.$this->path;
	}

	// What object does this photo belong to?
	public function photoable()
	{
		return $this->morphTo();
	}


}
