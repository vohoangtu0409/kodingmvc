<?php
function app($abstract = null){
    $app = \Application\App::getInstance();
    if(is_null($abstract)) return $app;
    return $app->make($abstract);
}
function request() : \Symfony\Component\HttpFoundation\Request{
    return app('request');
}
function sesion() : \Symfony\Component\HttpFoundation\Session\Session{
    return app('session');
}

function files() : \League\Flysystem\Filesystem{
    return app('files');
}

function router() : \Application\Routing\Router{
    return app('router');
}

function view() : Application\View{
    return app('view');
}