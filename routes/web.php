<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/{page:slug}', [\App\Http\Controllers\PageController::class, 'index']);
