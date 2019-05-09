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

Route::prefix('v1')->group(function () {
    Route::post('register', 'Api\AuthController@register');
    Route::post('login', 'Api\AuthController@login');
    Route::get('/post', 'Api\PostController@index')->name('post.index');
    Route::get('/post/{id}', 'Api\PostController@show')->name('post.show');
    Route::resource('/category', 'Api\CategoryController');
    Route::group(['middleware' => ['auth:api', 'role']], function () {
        Route::resource('/comment', 'Api\CommentController')->except('show', 'index', 'edit', 'create');;
        Route::resource('/post', 'Api\PostController')->except('show', 'index', 'edit', 'create');
    });
});
