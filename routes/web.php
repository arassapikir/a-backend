<?php

use Illuminate\Support\Facades\Route;

if (count(explode(".", request()->getHttpHost())) == 2){
    Route::get('/', 'HomeController@index')->name('index');

    Route::get('/login', function (){
        abort(404);
    });
}
else{
    Route::namespace('Web')
        ->group(function ()
        {
            Route::middleware(['auth:sanctum'])->group(function (){
                Route::get('/', 'HomeController@index')->name('home');


                //profile
                Route::post('/profile/update', 'Api\ProfileController@update')->name('profile.update')->middleware('auth');
                Route::post('/profile/update/password', 'Api\ProfileController@password')->name('profile.password')->middleware('auth');
            });

            //forgot password
            Route::get('forgot', 'ForgotController@forgot')->name('forgot.index');
            Route::post('forgot/send', 'ForgotController@forgot_send_otp')->name('forgot.send');
            Route::post('forgot/store', 'ForgotController@forgot_store')->name('forgot.store');
            Route::post('password', 'ProfileController@password')->name('password.store');
        });
}

//change language
Route::get('lang/{lang}', 'LanguageController@switch')->name('switch.lang');
