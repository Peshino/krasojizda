<?php

Auth::routes();

Route::get('/', 'IntroductionController@index');

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('uzivatel')->group(function () {
    Route::get('profil', 'UserController@getProfile')->name('profile');
});
