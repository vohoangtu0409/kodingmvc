<?php
namespace Application;

abstract class ServiceProvider implements \Application\Contracts\ServiceProvider{
    protected $app;
    public function __construct(App $app = null)
    {
        $this->app = App::getInstance();
    }
    public function getApp(){
        return $this->app;
    }
    public function loadRoute($route){
        include $route;
    }
}