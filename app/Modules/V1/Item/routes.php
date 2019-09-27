<?php

Route::group([
    'namespace' => 'App\Modules\V1\Item\Controllers',
], function () {
    Route::group(['prefix' => 'v1/items/'], function () {
        Route::get('/', 'ItemController@index')->name('Item.list');
        Route::post('/', 'ItemController@store')->name('Item.store');
        Route::get('/{id}', 'ItemController@show')->name('Item.show');
        Route::put('/{id}', 'ItemController@update')->name('Item.update');
        Route::delete('/{id}', 'ItemController@destroy')->name('Item.delete');
    });
});
