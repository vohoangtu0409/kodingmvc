<?php
namespace App\Packages\Dashboard\Providers;

use Illuminate\Support\ServiceProvider;

class DashboardServiceProvider extends ServiceProvider{

    public function register()
    {
        $this->loadViewsFrom(dirname(__DIR__).DIRECTORY_SEPARATOR.'resources/views', 'dashboard');
        $this->loadTranslationsFrom(dirname(__DIR__).DIRECTORY_SEPARATOR.'resources/lang', 'dashboard');
        $this->mergeConfigFrom(dirname(__DIR__).DIRECTORY_SEPARATOR.'Configs', 'dashboard');

        $this->loadRoutesFrom(dirname(__DIR__).DIRECTORY_SEPARATOR.'dashboard-routes.php');
        $this->loadMigrationsFrom(dirname(__DIR__).DIRECTORY_SEPARATOR.'database');
    }

    public function boot()
    {

    }
}
