<?php

Auth::routes();

Route::get('/', 'IntroductionController@index');

Route::get('home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')->name('welcome');
Route::post('searchPartnerAjaxPost', 'HomeController@searchPartnerAjaxPost')->name('searchPartnerAjaxPost');

Route::resource('krasojizda', 'KrasojizdaController');

Route::resource('users', 'UserController');

Route::resource('invitations', 'InvitationController');

Route::resource('important-days', 'ImportantDayController');

Route::resource('posts', 'PostController');

Route::resource('conversations', 'ConversationController');

Route::prefix('posts/{post}')->group(function () {
    Route::resource('post-comments', 'CommentController');
});

Route::prefix('conversations/{conversation}')->group(function () {
    Route::resource('conversation-comments', 'CommentController');
});
