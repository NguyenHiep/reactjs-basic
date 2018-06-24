<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        Schema::defaultStringLength(255);
        Validator::extend('recaptcha', 'App\Validators\Recaptcha@validate');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment() !== 'production') {
            $this->app->register(\Barryvdh\LaravelIdeHelper\IdeHelperServiceProvider::class);
        }

        // register helpers
        foreach (glob(app_path().'/Helpers/*.php') as $filename){
            require_once($filename);
        }

        // register trait
        foreach (glob(app_path().'/Traits/*.php') as $filename){
            require_once($filename);
        }

    }
}
