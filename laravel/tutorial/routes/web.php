<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tesztcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teszt', [TesztController::class, 'teszt']);