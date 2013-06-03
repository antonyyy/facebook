<?php


Route::any('/', array('uses' => 'home@index'));

Route::any('home', array('uses' => 'home@index'));

Route::get('viewdatas', array('uses'=>'viewdatas@index'));


//forma new
Route::get('new',array('as'=>'new','uses'=>'new@new'));


//form post

Route::post('new/create',array('uses'=>'new@create'));





Event::listen('404', function()
{
	return Response::error('404');
});

Event::listen('500', function()
{
	return Response::error('500');
});


Route::filter('before', function()
{
	// Do stuff before every request to your application...
});

Route::filter('after', function($response)
{
	// Do stuff after every request to your application...
});

Route::filter('csrf', function()
{
	if (Request::forged()) return Response::error('500');
});

Route::filter('auth', function()
{
	if (Auth::guest()) return Redirect::to('login');
});