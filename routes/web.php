<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/{slug}', [\App\Http\Controllers\PageController::class, 'index']);
Route::get('/{locale}/{slug}', [\App\Http\Controllers\PageController::class, 'localeAware'])
    ->where('locale', '[a-z]{2}');
