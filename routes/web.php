<?php

use App\Services\Github;
use Illuminate\Support\Facades\Route;

Route::get('/', function (Github $github) {
    return view('home');
});
