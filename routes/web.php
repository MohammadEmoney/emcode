<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::post('comment/approval/{comment}', 'CommentController@approve');
    Route::get('user/profile/{user}', 'UserController@profile')->name('user.profile');
    Route::resource('categories', 'CategoryController');
    Route::resource('articles', 'ArticleController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
    Route::post('/attachImage', 'ArticleController@attachImage')->name('ckeditor.upload');
});

Route::namespace('Front')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('article/{article}', 'HomeController@single')->name('single.article');
    Route::get('categories', 'HomeController@categories')->name('categories');
    Route::get('categories/{category}', 'HomeController@singleCategory')->name('single.category');
    Route::get('contact', 'HomeController@contact')->name('contact');
});

Auth::routes();
