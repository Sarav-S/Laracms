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
    return view('welcome');
});

Route::group(
    [
        'middleware' => 'auth',
        'prefix'     => 'admin',
        'as'         => 'admin.'
    ], 
    function () {
        Route::put(
            'categories/{category}/recover', 
            'Admin\\CategoryController@recover'
        )->name('categories.recover');

        Route::delete(
            'categories/{category}/permanent', 
            'Admin\\CategoryController@permanentDelete'
        )->name('categories.shift_delete');

        Route::resource('categories', 'Admin\\CategoryController');

        Route::put(
            'posts/{post}/recover',
            'Admin\\PostController@recover'
        )->name('posts.recover');

        Route::delete(
            'posts/{post}/permanent',
            'Admin\\PostController@permanentDelete'
        )->name('posts.shift_delete');

        Route::resource('posts', 'Admin\\PostController');
    }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
