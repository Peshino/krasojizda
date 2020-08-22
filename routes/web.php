<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Auth::routes();

Route::get('/', 'IntroductionController@index');

Route::get('home', 'HomeController@index')->name('home');
Route::get('welcome', 'HomeController@welcome')->name('welcome');
Route::post('searchPartnerAjaxPost', 'HomeController@searchPartnerAjaxPost')->name('searchPartnerAjaxPost');

Route::resource('krasojizda', 'KrasojizdaController');

Route::resource('users', 'UserController');

Route::resource('invitations', 'InvitationController');

Route::resource('our-places', 'OurPlaceController');

Route::resource('life-events', 'LifeEventController');

Route::resource('important-days', 'ImportantDayController');
Route::get('important-days/filter/{year}', 'ImportantDayController@index')->name('filter-by-year');

Route::resource('conversations', 'ConversationController');

Route::resource('posts', 'PostController');

Route::prefix('posts/{post}')->group(function () {
    Route::resource('post-comments', 'CommentController');
});

Route::prefix('conversations/{conversation}')->group(function () {
    Route::resource('conversation-comments', 'CommentController');
});
