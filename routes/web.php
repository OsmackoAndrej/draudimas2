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
use App\Http\Controllers\Auth\LoginController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'store']);
//Auth::routes();
Route::get('/home', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'index'])->name('home.index');

Route::resource('owners', OwnerController::class)->only('index');
Route::resource('owners', OwnerController::class)->except(['index','destroy'])->middleware(Bug::class);
Route::resource('owners', OwnerController::class)->only(['update','edit','destroy'])->middleware(IsAdmin::class);
//Auth::routes();
//Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home.index');




Route::resource('cars' , CarsController::class);
Route::post('/cars/{car}/photos', [CarPhotoController::class, 'store'])->name('cars.photos.store');
Route::get('/cars/{car}/photos', [CarPhotoController::class, 'index'])->name('cars.photos.index');





Route::get('setLanguage/{lang}', [LangController::class, 'switchLang'])->name('setLanguage');


Route::post('logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');






