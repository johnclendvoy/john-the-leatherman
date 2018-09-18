<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leather extends Model
{
	protected $guarded = ['image'];

	protected $table = 'leathers';

	
	// SCOPES

	public function scopeActive($q)
	{
		return $q->where('active', 1);
	}

	// ATTRIBUTES
	
	public function getClassAttribute()
	{
		return 'leathers';
	}

	public function getSlugAttribute()
	{
		return str_slug($this->name);
	}

	public function getUrlAttribute()
	{
		return '/leather/'.$this->id.'/'.$this->slug;
	}

	public function getInCartAttribute()
	{
		return in_array($this->id, session('cart'));
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

	// HELPERS


	// return a collection of $num leather items that are in the same category or the same color as the current leather item
	public function similar($num)
	{
		$same_color = Leather::active()->where('id', '!=', $this->id)->where('color_id', $this->color_id)->get();
		$same_cat = Leather::active()->where('id', '!=', $this->id)->where('category_id', $this->category_id)->get();
		$matches = $same_cat->union($same_color)->unique('id');

		if($matches->count() < $num)
		{
			$partial_matches = $same_color->merge($same_cat)->diff($matches);
			$matches = $matches->merge($partial_matches);
		}
		if($matches->count() < $num)
		{
			$remaining = $num - $matches->count();
			$non_matches = Leather::active()->get()->diff($matches)->take($remaining);
			$matches = $matches->merge($non_matches);
		}
		return $matches->take($num);
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
			if($size == 'thumbnail_small')
			{
				return 'http://via.placeholder.com/80x80';
		}
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

	public function order()
	{
		$this->belongsTo('App/Order');
	}
	
}
