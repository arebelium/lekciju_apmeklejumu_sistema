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

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/profile', 'UserController@index');
Route::get('/profile/edit',  'UserController@edit')->name('users.edit');
Route::patch('/profile/update/',  'UserController@update')->name('users.update');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    Route::post('/add/user/', 'AdminController@addUser');
    Route::patch('/update/user/{id}', 'AdminController@updateUser');
    Route::get('/delete/user/{id}', 'AdminController@deleteUser');

    Route::patch('/update/lecturer/{id}', 'AdminController@updateLecturer');
    Route::get('/delete/lecturer/{id}', 'AdminController@deleteLecturer');
    Route::post('/add/lecturer/', 'AdminController@addLecturer');
   
    Route::post('/add/lecture/', 'AdminController@addLecture');
    Route::patch('/update/lecture/{id}', 'AdminController@updateLecture');
    Route::get('/delete/lecture/{id}', 'AdminController@deleteLecture');
    
    Route::post('/add/course/', 'AdminController@addCourse');
    Route::patch('/update/course/{id}', 'AdminController@updateCourse');
    Route::get('/delete/course/{id}', 'AdminController@deleteCourse');

    Route::post('/schedule/lecture/', 'LecturerController@scheduleLecture');
    
    Route::get('/', 'AdminController@index')->name('admin.home');
});

Route::prefix('lecturer')->group(function() {
    Route::get('/login', 'Auth\LecturerLoginController@showLoginForm')->name('lecturer.login');
    Route::post('/login', 'Auth\LecturerLoginController@login')->name('lecturer.login.submit');
    Route::get('/dash', 'LecturerController@index')->name('lecturer.home');
});

Route::view('/lekcijas', 'lekcijas');
