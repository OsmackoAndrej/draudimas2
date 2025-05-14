<?php

use App\Http\Controllers\OwnerAPI;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/owners', [OwnerAPI::class, 'index']);
Route::post('/owners', [OwnerAPI::class, 'store']);
Route::get('/owners/{id}', [OwnerAPI::class, 'show']);
Route::put('/owners/{id}', [OwnerAPI::class, 'update']);
Route::delete('/owners/{id}', [OwnerAPI::class, 'destroy']);
