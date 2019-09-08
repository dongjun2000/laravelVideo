<?php

Route::prefix('admin')->namespace('Admin')->name('admin.')->group(function () {

    // 后台首页
    Route::get('/', 'EntryController@home')->name('home');

    // 管理员登录
    Route::get('login', 'EntryController@loginForm')->name('login');
    Route::post('login', 'EntryController@login')->name('login');

    // 退出登录
    Route::get('logout', 'EntryController@logout')->name('logout');

});
