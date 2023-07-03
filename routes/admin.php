<?php

use Illuminate\Support\Facades\Route;

/* New Router */

Route::group(['namespace' => 'Admin', 'prefix' => 'api/'], function () {
    Route::get('auth/check', 'AuthenticateController@checkAuth');
    Route::get('authenticate/check', 'AuthenticateController@checkAuthenticate');
    Route::post('login', 'AuthenticateController@login');
});

/* ============================= Authentication Router ============================= */
Route::group(['namespace' => 'Admin', 'middleware' => 'admin', 'prefix' => 'api/'], function () {
    /* ================ Category ================ */
    Route::get('category/active-inactive/{id}', 'CategoryController@activeInactive');
    Route::post('categories/{id}', 'CategoryController@update');
    Route::apiResource('categories', 'CategoryController');

    /* ================ Logout ================ */
    Route::get('logout', 'AuthenticateController@logout');
});
