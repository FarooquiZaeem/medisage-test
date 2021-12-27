<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// BasicAuth Middleware applied globally
Route::group(['prefix' => 'students', 'namespace' => 'App\Http\Controllers'], function() {

    // Since it is specified to take inputs as POST request for both requests
    Route::post('', 'StudentController@index');
    Route::post('/store', 'StudentController@store');
});
