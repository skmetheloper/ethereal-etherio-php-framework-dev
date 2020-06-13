<?php

Route::api([
    'limit:minute' => 60,
    'limit:month' => 3000,
    'format' => 'json',
]);

Route::get('api/users', 'UserController@index');

Route::get('api/user/{id}', 'UserController@show');
