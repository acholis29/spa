<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [
  App\Http\Controllers\HomeController::class,
  'index',
])->name('home');

Route::get('/detail/{id}', [
  App\Http\Controllers\DetailController::class,
  'index',
])->name('detail');