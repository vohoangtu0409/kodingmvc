<?php
namespace App\Home\Provider;

use Application\ServiceProvider;

class HomeProvider extends ServiceProvider{

    public function boot()
    {
        $this->loadRoute(dirname(__DIR__) . DIRECTORY_SEPARATOR . 'routes.php');
        $this->loadViewFrom(dirname(__DIR__) . DIRECTORY_SEPARATOR .'Resources/view', 'home');
    }
}