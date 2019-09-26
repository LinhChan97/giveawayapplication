<?php

Route::group([
    'namespace' => 'App\Modules\V1\Authentication\Controllers',
], function () {
    Route::group(['prefix' => 'v1/auth/'], function () {
        Route::post('/login', 'AuthenticateController@login')->name('login');
        Route::post('/register', 'AuthenticateController@register')->name('register');
        Route::get('/logout', 'AuthenticateController@logout')->name('logout');
        Route::get('/me', 'AuthenticateController@getCurrentUser')->name('auth.me');
    });
});
