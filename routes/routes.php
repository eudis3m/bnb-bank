<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JsonController;

    Route::get('/users', 'JsonController@index');
    Route::get('/users/{id}', 'JsonController@show');
    Route::post('/users', 'JsonController@store');
    Route::put('/users/{id}', 'JsonController@update');
    Route::delete('/users/{id}', 'JsonController@destroy');
