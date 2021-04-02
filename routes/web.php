<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'Web\HomeController@index')->name('a');

Route::domain('{subdomain}.' . config('app.domain'))->namespace('Web')->middleware(['auth:sanctum'])->group(function () {
    Route::get('/', 'HomeController@index')->name('index');



    //profile
    Route::post('/profile/update', 'Api\ProfileController@update')->name('profile.update')->middleware('auth');
    Route::post('/profile/update/password', 'Api\ProfileController@password')->name('profile.password')->middleware('auth');

    //change language
    Route::get('/lang/{lang}', 'LanguageController@switch')->name('switch.lang');
});


