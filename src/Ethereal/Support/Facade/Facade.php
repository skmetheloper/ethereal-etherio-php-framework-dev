<?php

namespace Ethereal\Support\Facade;

abstract class Facade
{
    /**
     * @return string
     */
    abstract public static function getFacadeAccessorName();

    private static function callFacadeMethod(string $accessor, string $name, array $arguments)
    {
        $instance = app()->instance($accessor);
        if (!$instance) {
            throw new \RuntimeException("Undefined facade accessor \"{$accessor}\" did not exist.");
        }
        return call_user_func_array([$instance, $name], $arguments);
    }

    final public function __call($name, $arguments)
    {
        return self::callFacadeMethod(
            static::getFacadeAccessorName(),
            $name,
            $arguments
        );
    }

    final public static function __callStatic($name, $arguments)
    {
        return self::callFacadeMethod(
            static::getFacadeAccessorName(),
            $name,
            $arguments
        );
    }
}
