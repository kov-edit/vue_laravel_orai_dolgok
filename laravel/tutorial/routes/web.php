<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tesztController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teszt', [TesztController::class, 'teszt']);