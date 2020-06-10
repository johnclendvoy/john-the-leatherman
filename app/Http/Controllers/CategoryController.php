<?php

namespace App\Http\Controllers;

use Arr;
use App\Category;
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

	public function create()
	{
		return $this->edit(new Category);
	}

	public function edit(Category $category)
	{
		return view('categories.create' , compact('category'));
	}

	public function store(CategoryFormRequest $request)
	{
		Arr::add($request, 'slug', str_slug($request->name));
		Category::create($request->all());
		return redirect('/categories/admin');
	}

	public function update(CategoryFormRequest $request, Category $category)
	{
		Arr::add($request, 'slug', str_slug($request->name));
		$category->update($request->all());
		return redirect('/categories/admin');
	}

	public function destroy(Category $category)
	{
		if($category->leathers->count())
		{
			$category->leathers()->dissacociate();
		}
		$category->delete();
		return redirect('/categories/admin');
	}
}
