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
// Page d'acceuil
Route::get('/', 'FrontController@index');

// Route pour afficher un post 
Route::get('post/{id}', 'FrontController@show')->where(['id'=>'[0-9]+']);

Auth::routes();
Route::get('/stage', 'FrontController@showStage')->name('stage');
Route::get('/formation', 'FrontController@showFormation')->name('formation');
Route::post('/search', 'FrontController@search')->name('search');

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('admin/post', 'PostController')->middleware('auth');
