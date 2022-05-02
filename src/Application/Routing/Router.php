<?php

namespace Application\Routing;

use Application\Contracts\Route;
use Symfony\Component\HttpFoundation\Request;
use System\Traits\Singleton;

class Router
{
    use Singleton;

    protected const POST='POST';
    protected const GET='GET';

    protected $current;

    protected $container = [];

    public function addRoute(Route $route){
        $this->container[$route->getMethod()][$route->getPath()] = $route;
    }

    public function addGet($path, $data, $callback = null){
        $route = new \Application\Routing\Route(self::GET, $path, $data, $callback);
        $this->addRoute($route);
        return $this;
    }
    public function addPost($path, $data, $callback = null){
        $route = new \Application\Routing\Route(self::POST, $path, $data, $callback);
        $this->addRoute($route);
        return $this;
    }

    public function resolve(Request $request, ...$arg){
        $pathInfo = $request->server->get('PATH_INFO');
        if(is_null($pathInfo)){
            $uri = '/';
        }

        $route = $this->container[strtoupper($request->getMethod())][$uri];

        $controller = app($route->getHandle()['_controller']);

        $method = new \ReflectionMethod($route->getHandle()['_controller'], $route->getHandle()['_action']);
        $parameters = $method->getParameters();
        $methodPara = [];
        foreach ($parameters as $parameter){
            $methodPara[] = app($parameter->getType()->getName());
        }
        $method->invokeArgs(app($route->getHandle()['_controller']),$methodPara);


    }
}