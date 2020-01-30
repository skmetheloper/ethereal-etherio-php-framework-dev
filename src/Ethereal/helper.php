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
