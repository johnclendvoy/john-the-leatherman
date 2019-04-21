<?php

namespace App\Http\Controllers;

use App\Color;
use App\Photo;
use App\Leather;
use App\Category;	
use Illuminate\Http\Request;
use App\Http\Requests\LeatherFormRequest;

class LeatherController extends Controller
{
	use ImageTrait;

	public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

	// List of all leather items
	public function admin()
	{
		$leathers = Leather::all();
		return view('leathers.admin', compact( 'leathers'));
	}

	// List of all leather items
	public function index(Request $request)
	{
		// to show in dropdowns
		$categories = Category::all();
		$colors = Color::all();
		// $categories = Category::whereHas('leathers')->get();
		// $colors = Color::whereHas('leathers')->get();

		$leathers = Leather::active()->orderBy('available', 'desc')->get();

		// current selections
		$category = null; //all
		$color = null; //all
		$available = null;

		// filtering based on leather nav selections
		if(!empty($request->category))
		{
			$category = Category::where('slug', $request->category)->first();
			$leathers = $leathers->where('category_id', $category->id);
		}
		if(!empty($request->color))
		{
			$color = Color::where('slug', $request->color)->first();
			$leathers = $leathers->where('color_id', $color->id);
		}
		if(!empty($request->available))
		{
			$available = $request->available;
			$is_available = $request->available == 'sale' ? 1 : 0;
			$leathers = $leathers->where('available', $is_available);
		}

		return view('leathers.index', compact('categories', 'colors', 'leathers', 'category', 'color', 'available'));
	}

	// Show a specific leather item
	public function show(Leather $leather)
	{
		$categories = Category::all();
		$colors = Color::all();
		$leathers = $leather->similar(4);
		return view('leathers.show', compact('categories', 'colors', 'leather', 'leathers'));
	}

	public function create()
	{
		return $this->edit(new Leather);
	}

	public function store(LeatherFormRequest $request)
	{
		$leather = Leather::create($request->all());
		if($request->image != '') {
			$filename = $leather->image_name = $this->saveAllImages($request->image, 'leathers' , $leather->id);
			$leather->image_name = $filename;
			$leather->save();
		}
		return redirect('/leather/' . $leather->id . '/add-photos');
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
		$leather->update($request->all());
		if($request->image != null) {
			$leather->image_name = $this->saveAllImages($request->image, 'leathers' , $leather->id);
			$leather->save();
		}
		return redirect('/leather/admin');
	}

	// Show a form to add many photos with dropzone
	public function addPhotos(Leather $leather)
	{
		$categories = Category::all();
		return view('leathers.add_photos', compact('categories', 'leather'));
	}

	// upload image dropped into dropzone
	public function uploadPhotos(Request $request, Leather $leather)
	{
		$photo = Photo::create();
		$photo->path = $this->saveAllImages($request->file, 'leathers', $photo->id);
		if(!empty($photo->path)){
			$leather->photos()->save($photo);
		}
		else{
			dd('upload failed');
		}
		return 'upload complete';
	}

	// set an image as the feature image
	public function setFeature(Request $request, Leather $leather, Photo $photo)
	{
		$leather->update(['feature_id' => $photo->id]);
		return redirect()->to('leather/'.$leather->id.'/add-photos');
	}

	public function destroy(Leather $leather)
	{
		foreach($leather->photos as $photo)
		{
			$this->deleteAllImages('leathers', $photo->path);
			$photo->delete();
		}
		$leather->delete();
		return redirect('/leather/admin');
	}

	public function destroyPhoto(Photo $photo)
	{
		$id = $photo->photoable->id;
		$this->deleteAllImages('leathers', $photo->path);
		$photo->delete();
		return redirect('/leather/' . $id . '/add-photos');
	}
	
}
