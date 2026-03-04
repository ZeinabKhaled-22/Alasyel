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

// add blog
Route::post('blog/addblog',[BlogController::class, 'store']);

// update blog
Route::post('blog/update/{id}',[BlogController::class,'update']);

// get all blogs
Route::get('blog/allblogs',[BlogController::class, 'index']);

// delete blog
Route::delete('blog/delete/{id}',[BlogController::class,'destroy']);

// get specific blog
Route::get('blog/specificblog/{id}',[BlogController::class,'show']);


