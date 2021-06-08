<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('posts', 'Api\PostController@index');

Route::apiResource('posts','Api\PostController');
Route::get('categories', 'Api\CategoryController@index');
