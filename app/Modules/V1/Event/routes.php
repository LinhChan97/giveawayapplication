<?php

Route::group([
    'namespace' => 'App\Modules\V1\Event\Controllers',
], function () {
    Route::group(['prefix' => 'v1/events/'], function () {
        Route::get('/', 'EventController@index')->name('event.list');
        Route::post('/', 'EventController@store')->name('event.store');
        Route::get('/{id}', 'EventController@show')->name('event.show');
        Route::put('/{id}', 'EventController@update')->name('event.update');
        Route::delete('/{id}', 'EventController@destroy')->name('event.delete');
    });
});
