<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;



Route::get('reboot', function () {
    Artisan::call('storage:link');
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('route:clear');
    Artisan::call('config:cache');
    dd("Ready to Start.");
});


###### ADMIN API ROUTES ######
require 'admin.php';
###### ADMIN API ROUTES ######


//admin mix routes
Route::get('/{any}', function () {
    return view('admin.master');
})->where('any', '^(?!api\/)[\/\w\.\,-]*');


