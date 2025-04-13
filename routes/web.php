<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboard');
});

/* Dashboard */
Route::get('/', 'LoginController@dashboard');

Route::get('login', 'LoginController@login')->name('login');
// Route::post('/login', 'LoginController@authenticate');
