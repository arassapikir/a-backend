<?php

use Illuminate\Support\Facades\Route;

Route::domain('{subdomain}.' . config('app.domain'))->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return "Home";
    })->name("index");
});


