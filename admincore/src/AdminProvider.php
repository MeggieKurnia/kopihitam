<?php

namespace AdminApp;

use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Builder;

class AdminProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
       $this->mergeConfigFrom(
        __DIR__ . '/config/coreadmin.php', 'coreadmin'
       );
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {   
        require __DIR__.'/helper.php';
        $this->loadRoutesFrom(__DIR__.'/routes.php');
        $this->publishes([
            __DIR__.'/config/coreadmin.php' => config_path('coreadmin.php'),
        ]);
        $this->loadViewsFrom(__DIR__.'/views','admin');
        Builder::macro('translate', function(){
            return $this->getModel()->lang()->where('lang',app()->getLocale())->first();
        });
    }
}
