<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleController;

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


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/articles', [App\Http\Controllers\ArticleController::class, 'index'])->name('article.index');
Route::get('/articles/{slug}', [App\Http\Controllers\ArticleController::class, 'show'])->name('article.show');
Route::get('/articles/tag/{tag}', [App\Http\Controllers\ArticleController::class, 'allByTag'])->name('article.tag');





