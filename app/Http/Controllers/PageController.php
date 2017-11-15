<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth')->only('dashboard', 'php');
    }


	public function php() 
	{
		dd(phpinfo());
	}

	public function home() 
	{
		return view('pages.home');
	}

	public function dashboard() 
	{
		$objects = [
			'leather',
			'categories',
			'colors',
			'projects',
			'messages',
		];
		return view('pages.dashboard', compact('objects'));
	}

	public function projects() 
	{
		$links = [
			['site'=>'github', 'url'=>'http://github.com/johnclendvoy'],
		];

		return view('pages.projects', compact('links'));
	}

	public function music() 
	{
		// info that belongs in the title jumbotron
		$links = [
			['site'=>'soundcloud', 'url'=>'http://soundcloud.com/codezillla'],
			['site'=>'facebook', 'url'=>'http://facebook.com/codezilllla'],
			['site'=>'bandcamp', 'url'=>'http://codezillla.bandcamp.com'],
			['site'=>'youtube-play', 'url'=>'https://www.youtube.com/channel/UCyCkHYh4wEWGcuXDD-fUBeQ'],
		];

		$youtubeCodes = [
			'qpeyMdG26WI',
			'NGtWvhGacao',
			'aIxKTQYJ63g',
			'HPn66QmTavE',
			'2-RtQdfYkGk',
			'KHqcFudRR4U',
			'BrhSQzrrcz4'
		];

		return view('pages.music', compact('youtubeCodes', 'links'));
	}


	public function contact() 
	{
		$links = [
			['site'=>'linkedin', 'url'=>'https://linkedin.com/in/johnclendvoy'],
			['site'=>'github', 'url'=>'http://github.com/johnclendvoy'],
			['site'=>'facebook', 'url'=>'http://facebook.com/johnclendvoy']
		];

		$sent = false;
		return view('pages.contact', compact('sent', 'links'));
	}
	
	
}
