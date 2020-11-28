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

// Criando arquivo do controller da rota: php artisan make:controller HelloWordController   
// Route::get('hello-world','HelloWorldController@index');

// Route::view('/bem-vindo','bemvindo');

// Route::get('/post/{slug?}', function($slug){
//     return $slug;
// });

// Route::get('/post/{slug?}', function($slug = null){
//     return !is_null($slug) ? $slug : 'Não teve parâmetro informado!';
// });

// Criando arquivo do controller da rota: php artisan make:controller UserController --resource
// Listando as rotas desse Controller: php artisan route:list
// Route::resource('/users','UserController');

Route::group(['middleware' => ['auth']], function() {
    Route::prefix('admin')->namespace('Admin')->group(function() {
        Route::resource('posts', 'PostController');
        Route::resource('categories', 'CategoryController');
        Route::prefix('profile')->name('profile.')->group(function (){
            Route::get('/','ProfileController@index')->name('index');
            Route::post('/','ProfileController@update')->name('update');
        });
    });
});

// Criando arquivo do controller da rota: php artisan make:controller Admin/PostController
// Route::prefix('admin')->namespace('Admin')->group(function(){
//     Route::resource('posts', 'PostController');
//     // Route::prefix('posts')->name('posts.')->group(function(){
//     //     Route::get('/create', 'PostController@create')->name('create');
//     //     Route::post('/store', 'PostController@store')->name('store');
//     // });
// });
// //Como seria:
// // Route::get('/admin/posts/create','Admin\PostController@create')->name('posts.create');
// // Route::get('/admin/posts/store','Admin\PostController@store')->name('posts.store');

// Route::prefix('admin')->namespace('Admin')->group(function () {
//     Route::resource('categories', 'CategoryController');

// });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Route::group(['middleware' => 'auth'], function () {
//     Route::group(['prefix' => 'admin'], function () {
//         Route::resource('posts', 'PostController');
//         Route::resource('categories', 'CategoryController');
//     });
// });