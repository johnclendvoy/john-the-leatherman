<?php

namespace App\Http\Controllers;

use App\Category;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\Http\Requests\CategoryFormRequest;

class CategoryController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }

    public function admin()
    {
    	$categories = Category::all();
		return view('categories.admin', compact( 'categories'));
    }

    // Show a form to add an object
	public function create()
	{
		return view('categories.create');
	}

	// Show a form to edit an object
	public function edit(Category $category)
	{
		return view('categories.create' , compact('category'));
	}

	// add object to db
	public function store(CategoryFormRequest $request)
	{
		array_add($request, 'slug', str_slug($request->name));
		Category::create($request->all());
		return Redirect::to('/categories/admin');
	}

	// edit object in db
	public function update(CategoryFormRequest $request, Category $category)
	{
		array_add($request, 'slug', str_slug($request->name));
		$category->update($request->all());
		return Redirect::to('/categories/admin');
	}

	// remove object from db
	public function destroy(Category $category)
	{
		if($category->leathers->count())
		{
			$category->leathers()->dissacociate();
		}

		$category->delete();
		return Redirect::to('/categories/admin');
	}
}
