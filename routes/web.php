<?php

Route::get('series', 'SeriesController@index');
Route::get('series/create', 'SeriesController@create');
Route::post('series/create', 'SeriesController@store');
Route::delete('series/remove/{id}', 'SeriesController@destroy');



