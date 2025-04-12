<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

// Route::get('login', 'LoginController@login')->name('login');
// Route::post('/login', 'LoginController@authenticate');
Route::get('/login', [LoginController::class, 'login'])->name('login');
