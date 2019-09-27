<?php

Route::group([
    'namespace' => 'App\Modules\V1\Category\Controllers',
], function () {
    Route::group(['prefix' => 'v1/categories/'], function () {
        Route::get('/', 'CategoryController@index')->name('Category.list');
        Route::post('/', 'CategoryController@store')->name('Category.store');
        Route::get('/{id}', 'CategoryController@show')->name('Category.show');
        Route::put('/{id}', 'CategoryController@update')->name('Category.update');
        Route::delete('/{id}', 'CategoryController@destroy')->name('Category.delete');
    });
});
