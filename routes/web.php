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


// Exemple de Route avec Parametre, partie recherche se trouve dans les route
// Route::get('test', function(){
//     return "je suis un test";
// });

// Route::get('posts/{id}', function($id){
//     return App\Post::find($id);
// });