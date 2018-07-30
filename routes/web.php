<?php

Auth::routes();

Route::group(['as' => 'view.'], function () {
    Route::get('/', 'PageController@index')->name('index');
});
