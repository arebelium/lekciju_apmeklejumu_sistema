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

Route::get('/home', function () {
    return view('home');
});

Auth::routes();

Route::get('/profile', 'StudentController@index');
Route::get('/profile/edit',  'StudentController@edit')->name('students.edit');
Route::patch('/profile/update/',  'StudentController@update')->name('students.update');

Route::prefix('admin')->group(function() {
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    
    Route::post('/add/student/', 'AdminController@addStudent');
    Route::patch('/update/student/{id}', 'AdminController@updateStudent');
    Route::get('/delete/student/{id}', 'AdminController@deleteStudent');

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


Route::prefix('lectures')->middleware(['auth:web,lecturer,admin'])->group(function() {
    Route::get('/', 'LecturesController@index')->name('lectures');
    Route::get('/delete/{id}', 'LecturesController@deleteLecture');
    Route::post('/check_attendance', 'LecturesController@checkAttendance')->name('lectures.check_attendance');
});