<?php

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    return view('about');
});

Route::get('login', 'UserController@login');
Route::post('login', 'UserController@auth');

Route::get('register', 'UserController@register');
Route::post('register', 'UserController@create');

Route::auth();
// The page that needs to be authorized

Route::get('dashboard', 'UserController@dashboard');

Route::post('logout', 'UserController@logout');
