<?php

Route::group([
    'namespace' => 'App\Modules\V1\Charity\Controllers',
], function () {
    Route::group(['prefix' => 'v1/charities/'], function () {
        Route::get('/', 'CharityController@index')->name('Charity.list');
        Route::post('/', 'CharityController@store')->name('Charity.store');
        Route::get('/{id}', 'CharityController@show')->name('Charity.show');
        Route::put('/{id}', 'CharityController@update')->name('Charity.update');
        Route::delete('/{id}', 'CharityController@destroy')->name('Charity.delete');
    });
});
