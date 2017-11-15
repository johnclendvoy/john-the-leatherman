<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leather extends Model
{
	protected $guarded = ['image'];

	protected $table = 'leathers';

	

	// ATTRIBUTES

	// return the number of photos there are in the slider, if there are 3 or more, return 3
	public function getClassAttribute()
	{
		return 'leathers';
	}

	// return the number of photos there are in the slider, if there are 3 or more, return 3
	public function getSliderClassAttribute()
	{
		$count = $this->photos->count();

		if(!empty($this->featurePhoto))
		{
			$count -= 1;
		}

		if($count < 3)
		{
			return $count;
		}
		return 3;
	}

	public function image($size)
	{
		$path = '/uploads/images/leathers/'. $size . '/';
		if(!empty($this->featurePhoto))
		{
			$name = $this->featurePhoto->path;
			return $path.$name;
		}
		elseif($this->photos->count() )
		{
			$name = $this->photos->first()->path;
			return $path.$name;
		}
		else
		{
			return 'http://via.placeholder.com/400x400';
		}
	}

	// RELATIONS

	// all photos of this item
	public function photos()
	{
		return $this->morphMany('App\Photo', 'photoable');
	}

	public function featurePhoto()
	{
		return $this->belongsTo('App\Photo', 'feature_id');
	}

	// The category of this item
	public function category()
	{
		return $this->belongsTo('App\Category');
	}

	public function color()
	{
		return $this->belongsTo('App\Color', 'color_id');
	}

}
