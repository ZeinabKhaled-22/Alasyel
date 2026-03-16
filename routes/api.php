<?php

use App\Http\Controllers\BlogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// CRUD of blogs
Route::group(['prefix'=>"blog"], function () {
    // add blog
    Route::post('addblog', [BlogController::class, 'store']);

    // update blog
    Route::post('update/{id}', [BlogController::class, 'update']);

    // get all blogs
    Route::get('allblogs', [BlogController::class, 'index']);

    // delete blog
    Route::delete('delete/{id}', [BlogController::class, 'destroy']);

    // get specific blog
    Route::get('specificblog/{id}', [BlogController::class, 'show']);

});