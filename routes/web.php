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

// CRUD blogs
Route::group(['perfix' => 'blog'], function () {
    // add blog
    Route::get('insert', [BlogController::class, 'create']);
    Route::post('create', [BlogController::class, 'store'])->name('blog.create');

    // get blog
    Route::get('index', [BlogController::class, 'index']);

    // update blog
    Route::get('edit/{id}', [BlogController::class, 'edit']);
    Route::put('update/{id}', [BlogController::class, 'update'])->name('blog.update');

    // delete blog
    Route::get('delete/{id}', [BlogController::class, 'destroy']);


});
