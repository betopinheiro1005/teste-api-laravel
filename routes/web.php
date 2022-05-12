<?php

use Illuminate\Support\Facades\Route;

Route::get('/api/{id}', 'ApiController@show')->name('api.show');
