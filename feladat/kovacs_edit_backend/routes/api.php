<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IngatlanController;

Route::get('/ingatlan', [IngatlanController::class, 'index']);
Route::post('/ingatlan', [IngatlanController::class, 'store']);
Route::delete('/ingatlan/{id}', [IngatlanController::class, 'destroy']);