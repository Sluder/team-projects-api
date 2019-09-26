<?php

Route::group(['prefix' => 'api'], function() {
    Route::group(['prefix' => 'temperature'], function() {
        Route::get('/', 'ApiController@getLastRecorded');
        Route::post('/{temp}', 'ApiController@setLastRecorded');
        //
        //    Route::get('/ranges', '');
        //    Route::post('/ranges', '');
    });

    Route::get('/mode', 'ApiController@getMode');
    Route::post('/mode/{mode}', 'ApiController@setMode');
    //
    Route::get('/switch', 'ApiController@getSwitch');
    Route::post('/switch/{switch_to}', 'ApiController@setSwitch');
});
