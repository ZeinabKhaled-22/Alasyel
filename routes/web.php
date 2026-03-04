<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// add blog
Route::post('blog/insert',[BlogController::class, 'store'])->name('blog.insert');

// get blog
Route::get('blog/index',[BlogController::class, 'index']);

// update blog
Route::put('blog/update/{id}',[BlogController::class,'update']);

// delete blog
Route::delete('blog/delete/{id}',[BlogController::class,'destroy']);
