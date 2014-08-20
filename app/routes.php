<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('index');
});

Route::get('/videos', array(
	'as' 	=> 'videos',
	function()
	{
		return View::make('videos.index')->with('videos', Video::all());
	}
));

Route::get('/videos/add', array(
	'as' 	=> 'addVideoForm',
	function()
	{
		$data = array(
			'actors' 		=> Actor::all(),
			'categories' 	=> Category::all(),
			'directors' 	=> Director::all(),
		);
		return View::make('videos.add')->with('data', $data);
	}
));

Route::post('/videos/add', array(
	'as' 	=> 'addVideoPost',
	function()
	{
		$data = Input::all();
		$video = new Video;
		$video->title = $data['title'];
		$video->description = $data['description'] ? $data['description'] : '';
		if($video->save()) {
			return Redirect::route('videos');
		}
		return $video;
	}
));

Route::get('/videos/edit/{id}', array(
	'as' 	=> 'editVideoForm',
	function($id)
	{
		$data = array(
			'video' 		=> Video::find($id),
			'actors' 		=> Actor::all(),
			'categories' 	=> Category::all(),
			'directors' 	=> Director::all(),
		);
		return View::make('videos.edit')->with('data', $data);
	}
));

Route::post('/videos/edit', array(
	'as' 	=> 'editVideoPost',
	function()
	{
		$data = Input::all();
		$video = Video::find($data['id']);
		$video->title = $data['title'];
		$video->description = $data['description'] ? $data['description'] : '';
		if($video->save()) {
			return Redirect::route('videos');
		}
		return $video;
	}
));

Route::get('/videos/video/{id}', function($id)
{
	return View::make('videos.item')->with('video', Video::find($id));
});

Route::get('/videos/autocomplete/{title}', function($title)
{
	$imdbID = json_decode(file_get_contents("http://www.omdbapi.com/?s={$title}"))->Search[0]->imdbID;
	$movie = json_decode(file_get_contents("http://www.omdbapi.com/?i={$imdbID}"));
	echo "<img src='" . $movie->Poster . "'>";
//	return Response::json($movie);
});







Route::get('/actors', array(
	'as' 	=> 'actors',
	function()
	{
		return View::make('actors.index')->with('actors', Actor::all());
	}
));

Route::get('/actors/add', array(
	'as' 	=> 'addActorForm',
	function()
	{
		return View::make('actors/add');
	}
));

Route::post('/actors/add', array(
	'as' 	=> 'addActorPost',
	function()
	{
		$data = Input::all();
		$actor = new Actor;

		$actor->name = $data['name'];

		if($actor->save()) {
			return Redirect::route('actors');
		}

		return $data;
	}
));







Route::get('/categories', array(
	'as' 	=> 'categories',
	function()
	{
		return View::make('categories.index')->with('categories', Category::all());
	}
));

Route::get('/categories/add', array(
	'as' 	=> 'addCategoryForm',
	function()
	{
		return View::make('categories/add');
	}
));

Route::post('/categories/add', array(
	'as' 	=> 'addCategoryPost',
	function()
	{
		$data = Input::all();
		$category = new Category;

		$category->name = $data['name'];

		if($category->save()) {
			return Redirect::route('categories');
		}

		return $data;
	}
));









Route::get('/directors', array(
	'as' 	=> 'directors',
	function()
	{
		return View::make('directors.index')->with('directors', Director::all());
	}
));

Route::get('/directors/add', array(
	'as' 	=> 'addDirectorForm',
	function()
	{
		return View::make('directors/add');
	}
));

Route::post('/directors/add', array(
	'as' 	=> 'addDirectorPost',
	function()
	{
		$data = Input::all();
		$director = new Director;

		$director->name = $data['name'];

		if($director->save()) {
			return Redirect::route('directors');
		}

		return $data;
	}
));




Route::post('/video/autocomplete', array(
	'as' 	=> 'autocomplete',
	function()
	{
		$data = Input::all();
		$title = urlencode($data['title']);
		$list = json_decode(file_get_contents("http://www.omdbapi.com/?s={$title}"))->Search;
		return Redirect::back()->with('autocomplete_list', $list);
	}
));

Route::get('/video/autocomplete/{id}', array(
	'as' 	=> 'autocompleteSuggestion',
	function($id)
	{
		$movie = json_decode(file_get_contents("http://www.omdbapi.com/?i={$id}"));
		return Redirect::back()->with('autocomplete_suggestion', $movie);
	}
));

Route::get('/search/autocomplete/{search?}', array(
	'as' 	=> 'searchAutocomplete',
	function($search = null)
	{
		if(isset($_GET['title'])) {
			$title = urlencode($_GET['title']);
			$list = json_decode(file_get_contents("http://www.omdbapi.com/?s={$title}"))->Search;
			$complete = array();
			foreach($list as $m) {
				array_push($complete, json_decode(file_get_contents("http://www.omdbapi.com/?i={$m->imdbID}")));
			}
			return View::make('search.autocomplete.index')->with('list', $complete);
		}
		if(!$search) {
			return View::make('search.autocomplete.index');
		}
		echo "no";
		die;
		$list = json_decode(file_get_contents("http://www.omdbapi.com/?s={$title}"))->Search;
		return Redirect::back()->with('autocomplete_list', $list);
	}
));

