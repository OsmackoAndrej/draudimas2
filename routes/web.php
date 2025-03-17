<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ModelisController;
use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('owners', OwnerController::class);
Route::resource('brands', BrandController::class);
Route::resource('modelis', ModelisController::class);
Route::resource('cars', CarsController::class);
