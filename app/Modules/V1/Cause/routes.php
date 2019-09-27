<?php

Route::group([
    'namespace' => 'App\Modules\V1\Cause\Controllers',
], function () {
    Route::group(['prefix' => 'v1/causes/'], function () {
        Route::get('/', 'CauseController@index')->name('Cause.list');
        Route::post('/', 'CauseController@store')->name('Cause.store');
        Route::get('/{id}', 'CauseController@show')->name('Cause.show');
        Route::put('/{id}', 'CauseController@update')->name('Cause.update');
        Route::delete('/{id}', 'CauseController@destroy')->name('Cause.delete');
    });
});
