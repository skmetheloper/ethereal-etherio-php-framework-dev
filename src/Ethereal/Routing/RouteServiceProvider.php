<?php

namespace Ethereal\Routing;

class RouteServiceProvider
{
    protected $router;

    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    public function get($path, $callback)
    {
        $path = '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }

    public function post($path, $callback)
    {
        $path = '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }

    public function put($path, $callback)
    {
        $path =  '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }

    public function patch($path, $callback)
    {
        $path =  '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }

    public function delete($path, $callback)
    {
        $path =  '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }

    public function options($path, $callback)
    {
        $path = '/' . trim($path, '\/');
        $this->router->collections[__FUNCTION__][] = compact('path', 'callback');
    }
}
