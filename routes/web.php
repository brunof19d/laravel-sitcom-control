<?php

Route::get('series', 'SeriesController@index');
Route::get('series/create', 'SeriesController@create');
Route::post('series/create', 'SeriesController@store');


