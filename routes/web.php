<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\LessonController;
use App\Http\Controllers\SiteController;
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
Route::prefix('/admin')->middleware('auth')->group(function(){
    Route::middleware('auth')->group(function(){
        Route::resource('/content', ContentController::class);
        Route::resource('/language', LanguageController::class);
        Route::resource('/lesson', LessonController::class);
    });
});
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('/{lang_id}/{lesson_id}', [SiteController::class, 'lesson'])->name('lessons');

