<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    //'middleware' => 'cors',
    'prefix' => 'v1',
], function () {
    // Auth Actions
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');

    // Index Actions
    Route::get('/post', 'Api\PostController@index')->name('post.index');
    Route::get('/category', 'Api\CategoryController@index')->name('category.index');
    Route::get('/comment', 'Api\CommentController@index')->name('comment.index');

    // Show Actions
    Route::get('/post/{id}', 'Api\PostController@show')->name('post.show');
    Route::get('/category/{id}', 'Api\CategoryController@show')->name('category.show');
    Route::get('/comment/{id}', 'Api\CommentController@show')->name('comment.show');

    // Group by Role Requirements
    Route::group(['middleware' => ['auth:api', 'role']], function () {
        Route::resource('/comment', 'Api\CommentController')->except('show', 'index', 'edit', 'create');
        Route::resource('/post', 'Api\PostController')->except('show', 'index', 'edit', 'create');
        Route::resource('/category', 'Api\CategoryController')->except('show', 'index', 'edit', 'create');
    });
});
