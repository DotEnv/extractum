<?php

/*
 * This file is part of the Dotenv Report package.
 *
 * (c) Tiago Perrelli <tiagoyg@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DotEnv\Report\Providers;

use Illuminate\Support\ServiceProvider;

use DotEnv\Report\Report;
use DotEnv\Report\Repositories\ReportRepository;
use DotEnv\Report\Contracts\ReportRepository as ReportRepositoryContract;

class ReportServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * Load routes
         */
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');

        /**
         * Load views
         */
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'report');

        /**
         * Load database migrations
         */
        $this->publishes([__DIR__.'/../../database/migrations/' => base_path('database/migrations')], 'migrations');
    }
    
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('report', function($app) {

            return new Report;
        });

        /**
         * Bind repositories
         */
        $this->app->bind(
            ReportRepositoryContract::class,
            ReportRepository::class
        );
    }
}