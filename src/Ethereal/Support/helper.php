<?php

//* PHP Helper For Etherio Framework

use Ethereal\Foundation\Application;

if (!function_exists('env')) {
    function env(string $name, $default = null)
    {
        return ($_ENV[$name] ?? getenv($name)) ?: $default;
    }
}

if (!function_exists('app')) {
    function app()
    {
        return Application::getInstance();
    }
}

if (!function_exists('base_path')) {
    function base_path(string $path = '', string $extension = '')
    {
        return app()->basePath($path, $extension);
    }
}


if (!function_exists('app_path')) {
    function app_path(string $path = '', string $extension = 'php')
    {
        return app()->appPath($path, $extension);
    }
}

if (!function_exists('config_path')) {
    function config_path(string $path = '', string $extension = 'php')
    {
        return app()->configPath($path, $extension);
    }
}

if (!function_exists('database_path')) {
    function database_path(string $path = '', string $extension = '')
    {
        return app()->databasePath($path, $extension);
    }
}

if (!function_exists('public_path')) {
    function public_path(string $path = '', string $extension = '')
    {
        return app()->publicPath($path, $extension);
    }
}

if (!function_exists('resources_path')) {
    function resources_path(string $path = '', string $extension = 'blade.php')
    {
        return app()->resourcesPath($path, $extension);
    }
}

if (!function_exists('routes_path')) {
    function routes_path(string $path = '', string $extension = 'php')
    {
        return app()->routesPath($path, $extension);
    }
}

if (!function_exists('storage_path')) {
    function storage_path(string $path = '', string $extension = '')
    {
        return app()->storagePath($path, $extension);
    }
}

if (!function_exists('config')) {
    function config(string $keyword, $default = null)
    {
        return app()->config($keyword, $default);
    }
}
