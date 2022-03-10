<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookmarkController;
use App\Http\Controllers\CommentController;

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
Route::post('/store',[PostController::class, 'store'])->name('posts.store');
Route::get('/index',[PostController::class, 'index'])->name('posts.index');
Route::get('/create',[PostController::class, 'create'])->name('posts.create');
Route::get('/show/{post}',[PostController::class, 'show'])->name('posts.show');

Route::post('/CommentStore',[CommentController::class, 'store'])->name('comments.store');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::post('like', [PostController::class, 'getlike']);
Route::post('like/{id}', [PostController::class, 'like']);
Route::post('dislike', [PostController::class, 'getDislike']);
Route::post('dislike/{id}', [PostController::class, 'dislike']);

Route::post('commentlike', [CommentController::class, 'Commentgetlike']);
Route::post('commentlike/{id}', [CommentController::class, 'Commentlike']);
Route::post('commentdislike', [CommentController::class, 'CommentgetDislike']);
Route::post('commentdislike/{id}', [CommentController::class, 'Commentdislike']);

Route::post('/bookmark', [BookmarkController::class, 'bookmark'])->name('bookmark');
Route::get('/showbookmark', [BookmarkController::class, 'index'])->name('bookmark.show');
Route::get('/bookmarklist', function () {
    return view('posts.bookmarked');
})->name('bookmarked');