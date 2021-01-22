<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UsersFilesController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'authorization'], function () {
    Route::get('/users', [UsersController::class, 'list']);
    Route::get('/user/{id}', [UsersController::class, 'user']);
    Route::post('/users/file/upload/{userId}', [UsersFilesController::class, 'getFile']);
});