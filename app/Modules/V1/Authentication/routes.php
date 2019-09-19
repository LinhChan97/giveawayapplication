<?php

Route::group([
    'namespace' => 'App\Modules\V1\Authentication\Controllers',
], function () {
    Route::group(['prefix' => 'v1/auth/'], function () {
        Route::post('/login', [
            'uses' => 'AuthenticateController@login',
            'name' => 'auth.login'
        ]);
        Route::get('/logout', [
            'uses' => 'AuthenticateController@logout',
            'name' => 'auth.logout',
            'middleware' => ['auth:api', 'auth.admin'],
        ]);
        Route::get('/me', [
            'uses' => 'AuthenticateController@getCurrentUser',
            'name' => 'auth.me',
        ]);
    });
});
