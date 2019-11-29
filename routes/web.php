<?php

Route::middleware('web', 'auth')
    ->get(config('routes.route_name', 'reports'))
    ->uses('DotEnv\Report\Controllers\ReportController@index')
    ->name('reports.index');

Route::middleware('web', 'auth')
    ->get(config('routes.route_name', 'reports') . '/create')
    ->uses('DotEnv\Report\Controllers\ReportController@create')
    ->name('reports.create');

Route::middleware('web', 'auth')
    ->post(config('routes.route_name', 'reports'))
    ->uses('DotEnv\Report\Controllers\ReportController@store')
    ->name('reports.store');