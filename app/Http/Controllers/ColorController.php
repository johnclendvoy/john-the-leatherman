<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorFormRequest;
use Illuminate\Support\Facades\Redirect;

class ColorController extends Controller
{
    	public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
    	$colors = Color::all();
		return view('colors.admin', compact( 'colors'));
    }

    // Show a form to add an object
	public function create()
	{
		return view('colors.create');
	}

	// Show a form to edit an object
	public function edit(Color $color)
	{
		return view('colors.create' , compact('color'));
	}

	// add object to db
	public function store(ColorFormRequest $request)
	{
		array_add($request, 'slug', str_slug($request->name));
		Color::create($request->all());
		return Redirect::to('/colors/admin');
	}

	// edit object in db
	public function update(ColorFormRequest $request, Color $color)
	{
		array_add($request, 'slug', str_slug($request->name));
		$color->update($request->all());
		return Redirect::to('/colors/admin');
	}

	// remove object from db
	public function destroy(Color $color)
	{
		if($color->leathers->count())
		{
			$color->leathers()->dissacociate();
		}

		$color->delete();
		return Redirect::to('/colors/admin');
	}
}
