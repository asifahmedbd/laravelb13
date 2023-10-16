<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/getCategories', 'ApiController@getCategories')->name('get-categories');
Route::get('/getAllFeaturedCategory', 'ApiController@getAllFeaturedCategory')->name('get-featured-categories');
Route::get('/getProductsById/{pid}', 'ApiController@getProductsById')->name('get-products-by-id');
Route::get('/getProductsByCategoryId/{cid}', 'ApiController@getProductsByCategoryId');

