<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Auth::routes();
Route::get('/',function(){
    return redirect()->route('posts.index');
})->name('view');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/store',[App\Http\Controllers\PostController::class, 'store'])->name('posts.store');
Route::get('/index',[App\Http\Controllers\PostController::class, 'index'])->name('posts.index');
Route::get('/create',[App\Http\Controllers\PostController::class, 'create'])->name('posts.create');
Route::get('/show/{post}',[App\Http\Controllers\PostController::class, 'show'])->name('posts.show');

Route::post('/CommentStore',[App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::post('like', [App\Http\Controllers\PostController::class, 'getlike']);
Route::post('like/{id}', [App\Http\Controllers\PostController::class, 'like']);
Route::post('dislike', [App\Http\Controllers\PostController::class, 'getDislike']);
Route::post('dislike/{id}', [App\Http\Controllers\PostController::class, 'dislike']);

Route::post('commentlike', [App\Http\Controllers\CommentController::class, 'Commentgetlike']);
Route::post('commentlike/{id}', [App\Http\Controllers\CommentController::class, 'Commentlike']);
Route::post('commentdislike', [App\Http\Controllers\CommentController::class, 'CommentgetDislike']);
Route::post('commentdislike/{id}', [App\Http\Controllers\CommentController::class, 'Commentdislike']);