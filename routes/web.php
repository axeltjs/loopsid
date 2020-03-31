<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'HomeController@index');
Route::get('/blog', 'HomeController@blog')->name('blog');
Route::get('/blog/{slug}', 'HomeController@single')->name('single-post');

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', 'DashboardController@index')->name('home');
    Route::resource('user', 'UserController');
    Route::resource('post', 'PostController');
    Route::get('profile','UserController@profileView');    
    Route::post('profile','UserController@profilePost');    
});

