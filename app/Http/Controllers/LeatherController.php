<?php

namespace App\Http\Controllers;

use File;
use Image;

use App\Color;
use App\Photo;
use App\Leather;
use App\Category;

use Illuminate\Support\Facades\Redirect;

use App\Http\Requests\LeatherFormRequest;
use Illuminate\Http\Request;

class LeatherController extends Controller
{
	use ImageTrait;

	// info that belongs in the title jumbotron
	public $social = [
		['site'=>'facebook', 'url'=>'http://facebook.com/johntheleatherman'],
		['site'=>'instagram', 'url'=>'http://instagram.com/johntheleatherman']
	];

	public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show', 'category', 'color']);
    }

	// List of all leather items
	public function admin()
	{
		$leathers = Leather::all();

		return view('leathers.admin', compact( 'leathers'));
	}

	// List of all leather items
	public function index()
	{
		$links = $this->social;
		$category = []; //all

		$categories = Category::all();
		$colors = Color::all();
		$leathers = Leather::all()->where('active', 1)->sortByDesc('id');

		return view('leathers.index', compact('links', 'categories', 'category', 'leathers', 'colors'));
	}

	// Show a specific leather item
	public function show(Leather $leather)
	{
		$links = $this->social;
		$categories = Category::all();
		$colors = Color::all();

		return view('leathers.show', compact('links', 'categories', 'colors', 'leather'));
	}

	// Show all Items of a given category
	public function category(Request $request, $slug)
	{
		$links = $this->social;
		$categories = Category::all();
		$colors = Color::all();

		$category = Category::where('slug', $slug)->first();
		$leathers = $category->leathers;

		if($request->color)
		{
			$color = Color::where('slug', $request->color)->first();
			$with_color = $color->leathers;
			$leathers = $leathers->intersect($with_color);
		}

		return view('leathers.index', compact('links', 'color', 'colors', 'category', 'categories', 'leathers'));
	}

	// Show all Items of a given color
	public function color(Request $request, $slug)
	{
		$links = $this->social;
		$categories = Category::all();
		$colors = Color::all();

		$color = Color::where('slug', $slug)->first();
		$leathers = $color->leathers;

		if($request->category)
		{
			$category = Category::where('slug', $request->category)->first();
			$with_category = $category->leathers;
			$leathers = $leathers->intersect($with_category);
		}

		return view('leathers.index', compact('links', 'color', 'colors', 'category', 'categories', 'leathers'));
	}

	// Show a form to add a leather item
	public function create()
	{
		$categories = Category::all();
		$colors = Color::all();
		return view('leathers.create', compact('categories', 'colors'));
	}

	// Show a form to add a leather item
	public function store(LeatherFormRequest $request)
	{
		$leather = Leather::create($request->all());

		if($request->image != '')
		{
			$filename = $leather->image_name = $this->saveAllImages($request->image, 'leathers' , $leather->id);
			$leather->image_name = $filename;
			$leather->save();
		}

		// return view('leathers.add_photos', compact('categories', 'leather'));
		return Redirect::to('/leather/' . $leather->id . '/add-photos');
	}

	// Show a form to change an object in the DB
	public function edit(Leather $leather)
	{
		$categories = Category::all();
		$colors = Color::all();
		return view('leathers.create', compact('categories', 'colors', 'leather'));
	}

	// Change an object in the DB
	public function update(LeatherFormRequest $request, Leather $leather)
	{
		// dd($request->all());
		$leather->update($request->all());

		if($request->image != null)
		{
			$leather->image_name = $this->saveAllImages($request->image, 'leathers' , $leather->id);
			$leather->save();
		}

		return Redirect::to('/leather/admin');
	}

	// Show a form to add many photos with dropzone
	public function addPhotos(Leather $leather)
	{
		$categories = Category::all();
		return view('leathers.add_photos', compact('categories', 'leather'));
	}

	public function uploadPhotos(Request $request, Leather $leather)
	{
		$photo = Photo::create();

		$photo->path = $this->saveAllImages($request->file, 'leathers', $photo->id);

		if(!empty($photo->path))
		{
			$leather->photos()->save($photo);
		}
		else
		{
			dd('upload failed');
		}
		return 'upload complete';
	}

	public function setFeature(Request $request, Leather $leather, Photo $photo)
	{
		$leather->update(['feature_id' => $photo->id]);
		return redirect()->to('leather/'.$leather->id.'/add-photos');
	}

	// Show a form to add a leather item
	public function destroy(Leather $leather)
	{
		foreach($leather->photos as $photo)
		{
			$this->removeImages($photo->image_name, $this->leather_sizes);
			$photo->delete();

		}
		$this->removeImages($leather->image_name, $this->leather_sizes);
		$leather->delete();
		return Redirect::to('/leather/admin');
	}

	// Show a form to add a leather item
	public function destroyPhoto(Photo $photo)
	{
			$id = $photo->photoable->id;
			$this->deleteAllImages('leathers', $photo->path);
			$photo->delete();

		return Redirect::to('/leather/' . $id . '/add-photos');
	}
	
}
