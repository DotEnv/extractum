<?php

Route::middleware('web', 'auth')
    ->get(config('routes.route_name', 'reports'))
    ->uses('DotEnv\Report\Controllers\ReportController@index');

Route::middleware('web', 'auth')
    ->get(config('routes.route_name', 'reports') . '/create')
    ->uses('DotEnv\Report\Controllers\ReportController@create');

Route::middleware('web', 'auth')
    ->post(config('routes.route_name', 'reports'))
    ->uses('DotEnv\Report\Controllers\ReportController@store');