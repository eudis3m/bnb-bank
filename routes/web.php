<?php

use Illuminate\Support\Facades\Route;
//use app\Http\Controllers\JsonController;
use App\Http\Controllers\JsonController;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/users', [JsonController::class, 'index']);
Route::get('/users/{id}', [JsonController::class, 'show']);
Route::post('/users', [JsonController::class, 'store']);
Route::put('/users/{id}', [JsonController::class, 'update']);
Route::delete('/users/{id}', [JsonController::class, 'destroy']);





