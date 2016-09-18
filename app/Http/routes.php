<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::group(['namespace' => 'Home'], function () {
    Route::get('/', ['uses' => 'ViewsController@home']);

    Route::get('/gallery', ['uses' => 'ViewsController@gallery']);

    Route::get('/service',['uses' => 'ViewsController@service']);

    Route::get('/about',['uses' => 'ViewsController@about']);

    Route::get('/contact',['uses' => 'ViewsController@service']);

    Route::get('/team',['uses' => 'ViewsController@team']);

    Route::get('/administrator',['uses' => 'HomeController@dashboard']);

    Route::get('/login',['uses' => 'AuthLoginController@login']);

//Route::auth();

    Route::get('/home', 'HomeController@index');


});

Route::get('/login',['uses' => 'Auth\AuthLoginController@login']);
