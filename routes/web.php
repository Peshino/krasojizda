<?php

Auth::routes();

Route::get('/', 'IntroductionController@index');

Route::get('home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')->name('welcome');
Route::post('searchPartnerAjaxPost', 'HomeController@searchPartnerAjaxPost');

Route::resource('krasojizda', 'KrasojizdaController');

Route::resource('important-days', 'ImportantDayController');

Route::resource('posts', 'PostController');

Route::prefix('posts/{post}')->group(function () {
    Route::resource('comments', 'CommentController');
});

Route::prefix('user')->group(function () {
    Route::get('profile', 'UserController@getProfile')->name('profile');
});
