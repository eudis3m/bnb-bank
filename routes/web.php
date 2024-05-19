<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\JsonController;
use App\Http\Controllers\JsonController;
use App\Http\Controllers\CustomerController;
//use Config\Session;
use App\Http\Middleware\VerifyCsrfToken;

Route::get('/', function () {
    return view('welcome');
});
//Route::get('/token', [VerifyCsrfToken::class, 'tokensMatch']);
Route::post('/users/index', [JsonController::class, 'index']);
Route::post('/customerTransaction/customerIndex', [CustomerController::class, 'index']);
Route::post('/customerTransaction/date', [CustomerController::class, 'indexDate']);
Route::post('/users/show', [JsonController::class, 'show']);
Route::post('/users/create', [JsonController::class, 'store']);
Route::post('/customerCreate', [CustomerController::class, 'store']);
Route::put('/users/update', [JsonController::class, 'update']);
Route::put('/customerUpdate', [CustomerController::class, 'update']);
Route::delete('/users/delete', [JsonController::class, 'destroy']);
Route::delete('/customerDelete', [CustomerController::class, 'destroy']);





