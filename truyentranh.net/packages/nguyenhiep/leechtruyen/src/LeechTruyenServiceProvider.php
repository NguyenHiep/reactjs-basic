<?php

namespace NguyenHiep\LeechTruyen;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class LeechTruyenServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/routes.php');
        // Load config leechtruyen
        $this->registerConfig();
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'leechtruyen');
        if ($this->app->runningInConsole()) {
            $this->registerMigrations();
            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/leechtruyen'),
            ], 'leechtruyen-views');
            $this->publishes([
                __DIR__ . '/../resources/assets/js/components' => base_path('resources/assets/js/components/leechtruyen'),
            ], 'leechtruyen-components');
           /* $this->commands([
                Console\InstallCommand::class,
                Console\ClientCommand::class,
                Console\KeysCommand::class,
            ]);*/
        }
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function registerConfig()
    {
        $source = realpath($raw = __DIR__ . '/../config/leechtruyen.php') ? : $raw;
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('leechtruyen.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('leechtruyen');
        }
        $this->mergeConfigFrom($source, 'leechtruyen');
    }

    public function registerMigrations()
    {
        if (LeechTruyen::$runsMigrations) {
            return $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        }
        $this->publishes([
            __DIR__ . '/../database/migrations' => database_path('migrations'),
        ], 'leechtruyen-migrations');
    }
}