<?php

namespace Ethereal\Routing;

use Ethereal\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    protected $router;

    public function register()
    {
        $this->app->bind('routes', function () {
            return $this->router;
        });
    }

    public function boot()
    {
        $this->app->instance('route', new Router);
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
