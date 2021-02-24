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
Route::get('/admin', 'Admin\AuthController@index');
Route::post('/admin/login', [ 'as' => 'login', 'uses' => 'Admin\AuthController@login']);
Route::get('/admin/logout', 'Admin\AuthController@logout');
Route::group(['prefix' => 'admin', 'middleware' => ['CheckSession']], function(){
    
    Route::get('/profile', 'Admin\UserController@profileDetail');
    Route::post('/profile/change-password', 'Admin\UserController@changePassword');
    Route::group(['middleware' => ['CheckPermission']], function(){
        Route::get('/user', 'Admin\UserController@index');
        Route::get('/user/edit/{id}', 'Admin\UserController@show');
        Route::get('/user/edit/{id}', 'Admin\UserController@show');
        Route::get('/user/add', 'Admin\UserController@add');
        Route::post('/user/create', 'Admin\UserController@store');
        Route::post('/user/update/{id}', 'Admin\UserController@update');
        Route::get('/user/delete/{id}', 'Admin\UserController@destroy');

        Route::get('/category', 'Admin\CategoryArticlesController@index');
        Route::get('/category/edit/{id}', 'Admin\CategoryArticlesController@show');
        Route::get('/category/add', 'Admin\CategoryArticlesController@add');
        Route::post('/category/create', 'Admin\CategoryArticlesController@store');
        Route::post('/category/update/{id}', 'Admin\CategoryArticlesController@update');
        Route::get('/category/delete/{id}', 'Admin\CategoryArticlesController@destroy');

        Route::get('/articles', 'Admin\ArticlesController@index');
        Route::get('/articles/edit/{id}', 'Admin\ArticlesController@show');
        Route::get('/articles/add', 'Admin\ArticlesController@add');
        Route::post('/articles/create', 'Admin\ArticlesController@store');
        Route::post('/articles/update/{id}', 'Admin\ArticlesController@update');
        Route::get('/articles/delete/{id}', 'Admin\ArticlesController@destroy');
    });

});

Route::get('/', 'Sites\ArticlesController@index');
Route::get('auth/facebook', 'Auth\FacebookController@facebookRedirect');
Route::get('auth/facebook/callback', 'Auth\FacebookController@loginWithFacebook');
Route::prefix('sites')->group(function () {
    Route::get('/login', 'Sites\AuthController@index');
    Route::post('/login', 'Sites\AuthController@login');
    Route::get('/logout', 'Sites\AuthController@logout');
    Route::get('/register', 'Sites\AuthController@register');
    Route::post('/register', 'Sites\AuthController@doRegister');

    Route::get('/articles', 'Sites\ArticlesController@list');
    Route::get('/articles/{slug}', 'Sites\ArticlesController@show');
    Route::get('/{slug}', 'Sites\ArticlesController@getArticlebyCategory');
});


