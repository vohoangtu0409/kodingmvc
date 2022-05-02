<?php
namespace Application;

abstract class ServiceProvider implements \Application\Contracts\ServiceProvider{
    public function loadRoute($route){
        include $route;
    }
    public function loadViewFrom($path, $namespace){
        view()->addNamespace($namespace, $path);
    }
}