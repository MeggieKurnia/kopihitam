<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\Frontend\HomeController::class,'index']);
Route::get('/layanan', [App\Http\Controllers\Frontend\ServicesController::class,'index']);
