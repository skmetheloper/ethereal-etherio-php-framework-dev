<?php

namespace Ethereal\Foundation;

class Application
{
    private static $instance;

    protected $basePath;

    public function __construct(string $basePath)
    {
        self::$instance = $this;
        $this->basePath = $basePath;
    }

    /**
     * Get the instance of current application
     *
     * @return \Ethereal\Foundation\Application
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    /**
     * Get absoulte path from base path
     *
     * @param  null|string $path
     * @return string
     */
    public function basePath(string $path = '')
    {
        return $this->basePath . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }
}
