<?php

namespace App\Http\Controllers;

use App\Color;
use Illuminate\Http\Request;
use App\Http\Requests\ColorFormRequest;

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

	public function create()
	{
		return $this->edit(new Color);
	}

	public function edit(Color $color)
	{
		return view('colors.create' , compact('color'));
	}

	public function store(ColorFormRequest $request)
	{
		array_add($request, 'slug', str_slug($request->name));
		Color::create($request->all());
		return redirect('/colors/admin');
	}

	public function update(ColorFormRequest $request, Color $color)
	{
		array_add($request, 'slug', str_slug($request->name));
		$color->update($request->all());
		return redirect('/colors/admin');
	}

	public function destroy(Color $color)
	{
		if($color->leathers->count())
		{
			$color->leathers()->dissacociate();
		}
		$color->delete();
		return redirect('/colors/admin');
	}
}
