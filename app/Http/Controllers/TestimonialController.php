<?php

namespace App\Http\Controllers;

use App\Leather;
use App\Testimonial;
use Illuminate\Http\Request;
use App\Http\Requests\TestimonialFormRequest;

class TestimonialController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->except(['index']);
    }

	public function index()
	{
		$testimonials = Testimonial::active()->get();
		return view('testimonials.index', compact('testimonials'));
	}

	public function admin()
	{
		$testimonials = Testimonial::all();
		return view('testimonials.admin', compact('testimonials'));
	}

	public function create()
	{
		return $this->edit(new Testimonial);
	}

	public function edit(Testimonial $testimonial)
	{
		$leathers = Leather::unavailable()->orderBy('name')->get();
		return view('testimonials.create', compact('testimonial', 'leathers'));
	}

	public function store(TestimonialFormRequest $request)
	{
		Testimonial::create($request->all());
		return redirect('/testimonials/admin');
	}

	public function update(TestimonialFormRequest $request, Testimonial $testimonial)
	{
		$tesimonial->update($request->all());
		return redirect('/testimonials/admin');
	}

	public function destroy(Testimonial $testimonial)
	{
		$testimonial->delete();
		return redirect('/testimonials/admin');
	}
}
