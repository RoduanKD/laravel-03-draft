<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;
// use Illuminate\Support\Facades\Storage;

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

Route::get('/', [PagesController::class, 'welcome']);

// Route::view('/posts/create', 'post.create');
Route::get('/posts/create', [PostController::class, 'create'])->middleware('auth');
Route::post('/posts', [PostController::class, 'store']);
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit']);
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destory')->middleware('auth');

Route::resource('categories', CategoryController::class);
Route::resource('tags', TagController::class);

Route::get('/contact', [PagesController::class, 'contact'])->name('contact');
Route::post('/contact', [MessageController::class, 'store']);

Route::get('/about', [PagesController::class, 'about']);

Route::get('/login', [LoginController::class, 'show'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->middleware('guest');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Route::get('/download', function ()
// {
//     return Storage::download('post_images/private.jpg');
// });

Route::get('/lang/{locale}', function ($locale) {
    if (! in_array($locale, ['en', 'ar'])) {
        return redirect()->back()->with('error', 'this lang is not supported');
    }

    session()->put('locale', $locale);

    return redirect()->back();
});
