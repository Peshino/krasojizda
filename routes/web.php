<?php

Route::get('/', function () {
    return view('introduction');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
