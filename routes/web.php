<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CarPhotoController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LangController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\Bug;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', [HomeController::class, 'index']);


Auth::routes();
Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');

Route::resource('owners', OwnerController::class)->only('index');

Route::resource('owners', OwnerController::class)->except(['index','destroy'])->middleware(Bug::class);

Route::resource('owners', OwnerController::class)->only('destroy')->middleware(IsAdmin::class);


Route::resource('cars' , CarsController::class);

Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');
Route::post('/cars/{car}/photos', [CarPhotoController::class, 'store'])->name('cars.photos.store');
Route::get('/cars/{car}/photos', [CarPhotoController::class, 'index'])->name('cars.photos.index');
Route::post('/register', [RegisterController::class, 'store'])->name('register');


