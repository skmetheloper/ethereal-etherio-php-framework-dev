<?php

namespace Ethereal\Support;

use Ethereal\Foundation\Application;

abstract class ServiceProvider
{
    /**
     * The instance of current application
     *
     * @var \Ethereal\Foundation\Application
     */
    protected $app;

    /**
     * Check the service provider has been registered
     *
     * @var boolean
     */
    protected $registered;

    public function __construct(Application $app)
    {
        $this->app = $app;
    }
    
    abstract public function register();

    abstract public function boot();

    public function init()
    {
        if ($this->registered) {
            throw new Error(static::class.' was already registered');
        }
        $this->register();
        $this->registered = true;
    }
}
