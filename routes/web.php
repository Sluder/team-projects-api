<?php

Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'temperature'], function() {
        Route::get('/ranges', 'ApiController@getRanges');
        //    Route::post('/ranges', '');

        Route::get('/', 'ApiController@getLastRecorded');
        Route::post('/{temp}', 'ApiController@setLastRecorded');
    });

    Route::get('/switch', 'ApiController@getSwitch');
    Route::post('/switch/{switch_to}', 'ApiController@setSwitch');
});
