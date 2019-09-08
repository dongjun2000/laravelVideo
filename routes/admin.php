<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('/', 'EntryController@home')->name('home');

    Route::get('login', 'EntryController@loginForm')->name('login');
    Route::post('login', 'EntryController@login')->name('login');
});
