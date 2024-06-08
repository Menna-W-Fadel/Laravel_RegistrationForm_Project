<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\changeLangController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', [UserController::class, 'create']);

Route::resource('user', UserController::class);

Route::get('locale/{locale}', [changeLangController::class, 'setlocale']);
Route::get('/get-movies', [ApiController::class, 'getAPI'])->name('get.movies');
