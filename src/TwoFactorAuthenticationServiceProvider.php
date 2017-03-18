<?php
namespace Thecodework\TwoFactorAuthentication;

use Illuminate\Support\ServiceProvider;

class TwoFactorAuthenticationServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     * Loading Routes, Views and Migrations
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes/routes.php');
        $this->loadViewsFrom(__DIR__ . '/../resources/views', '2fa');
        $this->loadMigrationsFrom(__DIR__.'/../database/migrations');

        # Publishing configuration file
         $this->publishes([
            __DIR__.'/../config/2fa-config.php' => config_path('2fa-config.php'),
        ]);

        # Publishing migration
        $this->publishes([
             __DIR__.'/../database/migrations/' => database_path('migrations')
        ], 'migrations');

        # Publishing views
        $this->publishes([
            __DIR__ . '/../resources/views/' => resource_path('views/vendor/2fa'),
        ]);
    }
    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        // register
    }
}