<?php

namespace Ethereal\Routing;

class Router
{
    protected $routePath;

    public $collections = [];

    protected $loaded;

    public function __construct()
    {
        app()->instance(
            'route',
            new RouteServiceProvider($this)
        );

        if (file_exists($this->routePath = routes_path('web'))) {
            require_once $this->routePath;
        }

        $this->matchRequestURL();
    }

    public function matchRequestURL()
    {
        $request_method = strtolower($_SERVER['REQUEST_METHOD']);
        $request_path = '/' . trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '\/');

        if (!key_exists($request_method, $this->collections)) {
            throw new \RuntimeException("Unexcepted Request Method: \"{$request_method}\" was denined");
        }

        foreach ($this->collections[$request_method] as $collections) {
            extract($collections);
            if ($request_path === $path) {
                return $this->loadRequestPage($collections);
            }
        }

        return $this->loadErrorPage(404);
    }

    protected function loadRequestPage(array $collections)
    {
        http_response_code(200);
        $this->loaded = $collections;
    }

    protected function loadErrorPage(int $status)
    {
        http_response_code($status);
        $this->loaded = false;
    }
}
