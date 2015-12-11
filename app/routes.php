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
	return Redirect::to('/result');
});

Route::get('/result', function()
{
	return View::make('public.result');
});


Route::get('/result/{roll}', function($roll)
{
	return View::make('public.result')->with('roll', $roll);
});


Route::post('/result', 'ResultController@search');

Route::get('/downloads', function()
{
	return View::make('public.downloads');
});

Route::any('/downloads/update_stat/{link_id}', function($link_id)
{
	$affected = DB::update('update download_links set download_count = download_count + 1 where link_id = ?', [$link_id]);			
	return json_encode(['success' => ($affected > 0) | false]);
});

Route::get('/search', function()
{
	return View::make('public.search');
});

Route::get('/search/{keyword}', function($keyword)
{
	DB::insert('INSERT INTO search_stats(search_keyword, searched_from) VALUES(?,?)', [$keyword, 'manual_search']);
	return View::make('public.search')->with('keyword', $keyword);
});

Route::post('/search', 'SearchController@search');

Route::get('/instructions', function()
{
	return View::make('public.instructions');
});

?>

