<?php

use Illuminate\Support\Facades\Auth;

// Route Home
Route::get('series', 'SeriesController@index')->name('show_series');

// Routes Series protected by middleware
Route::get('series/create', 'SeriesController@create')->name('form_create_serie')->middleware('auth');;
Route::post('series/create', 'SeriesController@store')->middleware('auth');;
Route::delete('series/remove/{id}', 'SeriesController@destroy')->middleware('auth');;
Route::post('/series/{id}/editName', 'SeriesController@editName')->middleware('auth');;
// End Routes protected by middleware

Route::get('series/{serieId}/seasons', 'SeasonsController@index');

Route::get('seasons/{season}/episodes', 'EpisodesController@index');
// Routes Seasons protected by middleware
Route::post('seasons/{season}/episodes/viewcheck', 'EpisodesController@viewcheck')->middleware('auth');
// End Routes protected by middleware

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/mylogin', 'LoginController@index');
Route::post('/mylogin', 'LoginController@mylogin');
Route::get('/register', 'RegisterController@create');
Route::post('/register', 'RegisterController@store');

Route::get('/mylogout', function () {

    Auth::logout();
    return redirect('/mylogin');
});

