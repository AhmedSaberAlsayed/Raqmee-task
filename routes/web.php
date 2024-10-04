<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\UserController;
use App\Http\Controllers\Dashboard\CommentController;



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
    return view('auth.register');
});

Route::get('/dashboard', function () {
    return redirect()->route("dashboard.posts.index");
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});

require __DIR__.'/auth.php';

Route::group(['prefix'=>'post', "middleware"=> "auth"],function(){
    Route::get('create',[PostController::class, "create"])->name('post.create');
    Route::get('show', [PostController::class, "show"])->name('dashboard.posts.show');
    Route::get('edit/{id}',[PostController::class, "edit"])->name('dashboard.posts.edit');
    Route::post('store',[PostController::class, "store"])->name('post.store');
    Route::post('update/{id}',[PostController::class, "update"])->name('post.update');
    Route::post('delete/{id}',[PostController::class, "destroy"])->name('post.delete');
    Route::get('/search', [PostController::class, 'search'])->name('posts.search');
});
Route::get('post/index',[PostController::class, "index"])->name('dashboard.posts.index');
Route::get('auth/google', [UserController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [UserController::class, 'handleGoogleCallback']);

Route::group(["prefix"=> 'comment', "middleware"=> "auth" ],function(){
    
Route::get('show/{id}',[CommentController::class,'show'])->name('comment.show');
Route::post('store/{id}',[CommentController::class, "store"])->name('comments.store');


});

