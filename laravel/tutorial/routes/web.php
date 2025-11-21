<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\tesztController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teszt', [TesztController::class, 'teszt']);
Route::get('/names', [TesztController::class, 'names']);
Route::get('/names/create/{family}/{name}', [TesztController::class, 'namesCreate'])->middleware('auth');
Route::get('/families/create/{name}', [TesztController::class, 'familiesCreate'])->middleware('auth');
Route::post('/names/delete', [TesztController::class, 'namesDelete'])->middleware('auth');
Route::get('/names/manage/surname', [TesztController::class, 'manageSurname'])->middleware('auth');
Route::post('/names/manage/surname/delete', [TesztController::class, 'deleteSurname'])->middleware('auth');
Route::post('/names/manage/surname/new', [TesztController::class, 'newSurname'])->middleware('auth');
Route::post('/names/manage/name/new', [TesztController::class, 'newName'])->middleware('auth');
Auth::routes();
Route::get('/profil', function () {
    return view('pages.profil');
})->middleware('auth');
Route::post('/profil/change-password', [App\Http\Controllers\UserController::class, 'changePassword'])->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
