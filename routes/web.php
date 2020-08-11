<?php

Route::get('series', 'SeriesController@index')->name('show_series');
Route::get('series/create', 'SeriesController@create')->name('form_create_serie');
Route::post('series/create', 'SeriesController@store');
Route::delete('series/remove/{id}', 'SeriesController@destroy');

Route::get('series/{serieId}/seasons', 'SeasonsController@index');

