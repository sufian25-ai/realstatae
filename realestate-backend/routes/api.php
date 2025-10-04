<?php

// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::group(['namespace'=> 'App\Http\Controllers'], function () {
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');

    Route::group(['middleware' => ['auth:sanctum']], function () {
        Route::post('/logout', 'AuthController@logout');
        Route::get('/user', 'AuthController@user');

        // Property routes
        Route::get('/properties', 'PropertyController@index');
        Route::post('/properties', 'PropertyController@store');
        Route::get('/properties/{id}', 'PropertyController@show');
        Route::put('/properties/{id}', 'PropertyController@update');
        Route::delete('/properties/{id}', 'PropertyController@destroy');
    });
});