<?php

use Illuminate\Support\Facades\Route;
if (count(explode(".", request()->getHttpHost())) == 2){
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/login', function (){
        abort(404);
    });
}
else{
    Route::domain('{subdomain}.' . config('app.domain'))
        ->namespace('Web')
        ->middleware(['auth:sanctum'])
        ->group(function ()
        {
            Route::get('/', 'HomeController@index')->name('home');



            //profile
            Route::post('/profile/update', 'Api\ProfileController@update')->name('profile.update')->middleware('auth');
            Route::post('/profile/update/password', 'Api\ProfileController@password')->name('profile.password')->middleware('auth');
        });
}


//change language
Route::get('/lang/{lang}', 'LanguageController@switch')->name('switch.lang');



