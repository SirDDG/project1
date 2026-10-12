<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::post('/skills', [PageController::class, 'storeSkill']);
Route::delete('/skills/{skill}', [PageController::class, 'deleteSkill']);
Route::get('/skills/{skill}/edit', [PageController::class, 'editSkill']);
Route::put('/skills/{skill}', [PageController::class, 'updateSkill']);