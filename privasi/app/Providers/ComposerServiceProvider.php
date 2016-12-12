<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    /*public function boot()
    {
        View()->composer(
            'layout/layout', 'App\Http\ViewComposers\CategoryComposer'
        );

    }*/

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
