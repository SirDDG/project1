<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return redirect('/about');
});

// Pages anyone can see
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);

// Only logged-in users
Route::post('/skills', [PageController::class, 'storeSkill'])->middleware('auth');
Route::delete('/skills/{skill}', [PageController::class, 'deleteSkill'])->middleware('auth');
Route::get('/skills/{skill}/edit', [PageController::class, 'editSkill'])->middleware('auth');
Route::put('/skills/{skill}', [PageController::class, 'updateSkill'])->middleware('auth');

// Login and register
Route::get('/register', [AuthController::class, 'showRegister'])->middleware('guest');
Route::post('/register', [AuthController::class, 'register'])->middleware('guest');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');