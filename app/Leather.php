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
	public function scopeInactive($q)
	{
		return $q->where('active', 0);
	}

	public function scopeAvailable($q)
	{
		return $q->where('available', 1);
	}

	public function scopeUnavailable($q)
	{
		return $q->where('available', 0);
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

	public function getDollarsAttribute()
	{
		return number_format($this->price, 2);
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

	public function swatch()
	{
		return $this->color->swatch();
	}


	// return a collection of $num leather items that are in the same category or the same color as the current leather item
	public function similar($num)
	{
		$leathers = Leather::active()->where('id', '!=', $this->id)->get();
		$same_color = $leathers->where('color_id', $this->color_id);
		$same_category = $leathers->where('category_id', $this->category_id);

		// matched both color and category
		$matches = $same_category->intersect($same_color)->unique('id');

		// if needed add more of same color
		if($matches->count() < $num) {
			$matches = $matches->merge($same_color)->unique('id');
		}
		// if needed add more of same category
		if($matches->count() < $num) {
			$matches = $matches->merge($same_category)->unique('id');
		}
		// if needed top off with random items
		if($matches->count() < $num) {
			$remaining = $num - $matches->count();
			$non_matches = $leathers->diff($matches)->take($remaining);
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
