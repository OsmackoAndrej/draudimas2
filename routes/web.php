<?php

use App\Http\Controllers\OwnerController;
use App\Http\Controllers\CarsController;
use App\Http\Middleware\Bug;
use App\Http\Middleware\IsAdmin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::resource('owners', OwnerController::class)->only('index');

Route::resource('owners', OwnerController::class)->except(['index','destroy'])->middleware(Bug::class);

Route::resource('owners', OwnerController::class)->only('destroy')->middleware(IsAdmin::class);


Route::resource('cars' , CarsController::class);
