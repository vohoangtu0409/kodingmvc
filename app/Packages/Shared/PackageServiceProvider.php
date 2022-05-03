<?php
namespace App\Packages\Shared;

use Illuminate\Support\ServiceProvider;

class PackageServiceProvider extends ServiceProvider{

    protected $moduleProviders = [

    ];

    public function register()
    {
        foreach ($this->moduleProviders as $moduleProvider){
            $this->app->resolveProvider($moduleProvider)->register();
        }
    }

    public function boot()
    {
        foreach ($this->moduleProviders as $moduleProvider){
            $this->app->resolveProvider($moduleProvider)->boot();
        }
    }
}
