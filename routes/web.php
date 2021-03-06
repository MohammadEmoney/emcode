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

Route::prefix('admin')->namespace('Admin')->middleware(['auth', 'admin'])->group(function(){
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::post('comment/approval/{comment}', 'CommentController@approve');
    Route::get('user/profile/{user}', 'UserController@profile')->name('user.profile');
    Route::resource('categories', 'CategoryController');
    Route::resource('articles', 'ArticleController');
    Route::resource('comments', 'CommentController');
    Route::resource('users', 'UserController');
    Route::post('/attachImage', 'ArticleController@attachImage')->name('ckeditor.upload');
    Route::resource('words', 'WordsController');
    Route::resource('school', 'SchoolController');
    Route::resource('students', 'StudentController');
    Route::resource('courses', 'CourseController');
    Route::resource('months', 'MonthController');
    Route::resource('reports', 'ReportCardController');
    Route::get('reports/{student_id}/create', 'ReportCardController@create')->name('create.report');
    Route::post('months/setdeafult', 'MonthController@defaultMonth')->name('default.month');
});

Route::namespace('Front')->group(function(){
    Route::get('/', 'HomeController@home')->name('home');
    Route::get('article/{article}-{slug}', 'HomeController@single')->name('single.article');
    Route::get('categories', 'HomeController@categories')->name('categories');
    Route::get('categories/{category}-{slug}', 'HomeController@singleCategory')->name('single.category');
    Route::get('contact', 'HomeController@contact')->name('contact');
    Route::post('like', 'LikeController@like');
    Route::post('like/update/{like}', 'LikeController@updateLike');
    Route::post('view/article', 'ViewController@view');
    Route::post('subscribe', 'HomeController@subscribe')->name('subscribe');
    Route::post('contact', 'HomeController@contactMessage')->name('contact.message');
    Route::get('words', 'WordsController@index')->middleware('auth');
    Route::get('words/search', 'WordsController@searchPage');
    Route::post('words/search', 'WordsController@search')->name('words.search');

    Route::get('school', 'SchoolController@index')->name('school');
    Route::get('school/report', 'ReportController@index')->name('school.report');
    Route::get('school/report/{report}', 'ReportController@report')->name('student.report');

    Route::get('resume', 'ResumeController@index')->name('resume');
    Route::get('resume/download', 'ResumeController@downloadResume')->name('download.resume');
    Route::get('resume-seed', 'ResumeController@seed');
});

Route::post('comments/article', 'Admin\CommentController@store')->name('comments.article');

Auth::routes();
Route::prefix('login')->namespace('Auth')->group(function(){
    Route::get('github', 'LoginController@redirectToProvider');
    Route::get('github/callback', 'LoginController@handleProviderCallback')->name('github.redirect');
    Route::get('google', 'GoogleLoginController@redirectToProvider')->name('google.login');
    Route::get('google/callback', 'GoogleLoginController@handleProviderCallback')->name('google.redirect');
    Route::get('facebook', 'LoginController@redirectToProvider');
    Route::get('facebook/callback', 'LoginController@handleProviderCallback')->name('facebook.redirect');
});
