<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'StatusController@myFeed');

Route::get('/status/create','StatusController@create');
Route::post('/status/store', 'StatusController@store');
Route::get('/status/display', 'StatusController@view');
Route::get('/follow', 'FollowController@canFollow');
Route::post('/new_follow', 'FollowController@follow');
Route::get('/following', 'FollowController@following');
Route::post('/unfollow', 'FollowController@unfollow');
Route::get('/followers', 'FollowController@myfollowers');


Route::auth();

Route::get('/home', 'HomeController@index');
