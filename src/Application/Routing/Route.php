<?php

namespace Application\Routing;

class Route implements \Application\Contracts\Route
{
    protected $method;
    protected $path;
    protected $handle;
    protected $action;

    /**
     * @param $method
     * @param $path
     * @param $handle
     * @param $action
     */
    public function __construct($method, $path, $handle, $action)
    {
        $this->method = $method;
        $this->path = $path;
        $this->handle = $handle;
        $this->action = $action;
    }


    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * @return mixed
     */
    public function getHandle()
    {
        if(is_array($this->handle)) return collect($this->handle);
        return $this->handle;
    }

    public function getAction()
    {
        return $this->action;
    }
}