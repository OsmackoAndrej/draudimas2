<?php

use App\Http\Controllers\Auth\CarsController;
use App\Http\Controllers\Auth\HomeController;
use App\Http\Controllers\Auth\LangController;
use App\Http\Controllers\Auth\OwnerController;
use App\Http\Controllers\Auth\CarPhotoController;
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
Route::get('/home', [\App\Http\Controllers\Auth\HomeController::class, 'index'])->name('home.index');

Route::resource('owners', OwnerController::class)->only('index');

Route::resource('owners', OwnerController::class)->except(['index','destroy'])->middleware(Bug::class);

Route::resource('owners', OwnerController::class)->only('destroy')->middleware(IsAdmin::class);


Route::resource('cars' , CarsController::class);

Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');
Route::post('/cars/{car}/photos', [CarPhotoController::class, 'store'])->name('cars.photos.store');
Route::get('/cars/{car}/photos', [CarPhotoController::class, 'index'])->name('cars.photos.index');


