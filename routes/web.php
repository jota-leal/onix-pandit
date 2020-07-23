<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'IndexController@index');

// Búsquedas por AJAX
Route::get('/search/{search}', 'IndexController@search');
Route::get('/search/{search}/{resultsLimit}', 'IndexController@search');

// Muestra de resultados
Route::get('/{search}', 'IndexController@index');
Route::get('/{search}/{resultsLimit}', 'IndexController@index');
