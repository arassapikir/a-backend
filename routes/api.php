<?php

use Illuminate\Support\Facades\Route;

Route::namespace('Api')->name('api.')->group(function () {

    //auth
    Route::name('auth.')->prefix('auth')->group(function () {
        Route::post('login', 'AuthController@login')->name('login');
        Route::post('verify', 'AuthController@verify')->name('verify');
        Route::get('logout', 'AuthController@logout')->name('logout')->middleware('auth:sanctum');
    });

    //home api
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('categories/{category}', 'CategoryController@show')->name('category.show');
});
