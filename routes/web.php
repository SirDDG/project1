<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about', [
        'name' => 'Serdg',
        'skills' => ['3D Modeling', 'Figma', 'PHP', 'Laravel', 'Photoshop'],
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'name' => 'Serdg',
    ]);
});
