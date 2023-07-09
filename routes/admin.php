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


    /* ================ Customer ================ */
    Route::post('customers/{id}', 'CustomerController@update');
    Route::apiResource('customers', 'CustomerController');
    /* ================ Logout ================ */
    /* ================ Logout ================ */
    /* ================ Logout ================ */
    /* ================ Logout ================ */
    /* ================ Logout ================ */
    /* ================ Logout ================ */
    /* ================ GEO Controller ================ */
    Route::get('division/list', 'GEOController@divisionList');
    Route::get('district/list', 'GEOController@districtList');
    Route::get('upazila/list', 'GEOController@upazilaList');
    Route::get('division/wise/district/list/{id}', 'GEOController@divisionWiseDistrictList');
    Route::get('district/wise/upazila/list', 'GEOController@districtWiseUpazilaList');

    /* ================ Logout ================ */
    Route::get('logout', 'AuthenticateController@logout');
});
