<?php

namespace App\Providers;

use Form;
use Illuminate\Support\ServiceProvider;

class ComponentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('capcha', 'components.form.capcha',['name']);
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
}
