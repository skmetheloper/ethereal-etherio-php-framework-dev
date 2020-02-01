<?php

namespace Ethereal\Foundation;

class Application
{
    /**
     * The instance of current application
     *
     * @var \Ethereal\Foundation\Application
     */
    private static $instance;

    /**
     * The absolute path of the base directory
     *
     * @var string
     */
    protected $basePath;

    /**
     *  The absolute path of the app directory
     *
     * @var string
     */
    protected $appPath;

    /**
     *  The absolute path of the config directory
     *
     * @var string
     */
    protected $configPath;

    /**
     *  The absolute path of the database directory
     *
     * @var string
     */
    protected $databasePath;

    /**
     *  The absolute path of the public directory
     *
     * @var string
     */
    protected $publicPath;

    /**
     *  The absolute path of the resources directory
     *
     * @var string
     */
    protected $resourcesPath;

    /**
     *  The absolute path of the routes directory
     *
     * @var string
     */
    protected $routesPath;

    /**
     *  The absolute path of the storage directory
     *s
     * @var string
     */
    protected $storagePath;

    /**
     *
     * @var array
     */
    protected $configs = [];

    /**
     *
     * @var array
     */
    protected $instances = [];

    /**
     *
     * @var array
     */
    protected $services = [];

    /**
     * @var boolean
     */
    protected $hasBeenLoaded = false;

    /**
     * The constructor of an applicaiton instance
     */
    public function __construct(string $basePath)
    {
        self::$instance = $this;

        $this->basePath = $basePath;
        $this->bindBasePaths();

        $this->loadBaseServices(
            new Environment($this, true)
        );
        $this->instance('app', $this);
    }

    protected function bindBasePaths()
    {
        $this->appPath = $this->basePath('app');
        $this->configPath = $this->basePath('config');
        $this->databasePath = $this->basePath('database');
        $this->publicPath = $this->basePath('public');
        $this->resourcesPath = $this->basePath('resources');
        $this->routesPath = $this->basePath('routes');
        $this->storagePath = $this->basePath('storage');
    }

    protected function loadBaseServices(Environment $env)
    {
        if ($alias = config('app.alias')) {
            $this->createFacade(new AliasLoader, $alias);
        }

        if ($services = config('app.services')) {
            foreach ($services as $service => $instance) {
                $this->services[$service] = new $instance;
            }
        }
        $this->hasBeenLoaded = true;
    }

    protected function createFacade(AliasLoader $loader, array $alias)
    {
        foreach ($alias as $alias_name => $alias_class) {
            $loader->make($alias_name, $alias_class);
        }

        return $loader;
    }

    public function instance(string $accessor, object $instance = null)
    {
        if (is_null($instance)) {
            return key_exists($accessor, $this->instances)
                ? $this->instances[$accessor]['instance']
                : null;
        }

        if (key_exists($accessor, $this->instances)) {
            return false;
        }

        $this->instances[$accessor] = [
            'instance' => $instance,
        ];

        return true;
    }

    /**
     * Get absoulte path from base path
     *
     * @param  string $path
     * @param  string $extension
     *
     * @return string
     */
    public function basePath(string $path = '', string $extension = '')
    {
        return $this->basePath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '') : $path);
    }

    /**
     * Get absoulte path from app path
     *
     * @param  string $path
     * @param  string $extension [php]
     *
     * @return string
     */
    public function appPath(string $path = '', string $extension = 'php')
    {
        return $this->appPath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '') : $path);
    }

    /**
     * Get absoulte path from config path
     *
     * @param  string $path
     * @param  string $extension [php]
     *
     * @return string
     */
    public function configPath(string $path = '', string $extension = 'php')
    {
        return $this->configPath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '')  : $path);
    }

    /**
     * Get absoulte path from database path
     *
     * @param  string $path
     * @param  string $extension
     *
     * @return string
     */
    public function databasePath(string $path = '', string $extension = '')
    {
        return $this->databasePath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '')  : $path);
    }

    /**
     * Get absoulte path from public path
     *
     * @param  string $path
     * @param  string $extension
     *
     * @return string
     */
    public function publicPath(string $path = '', string $extension = '')
    {
        return $this->publicPath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '') : $path);
    }

    /**
     * Get absoulte path from resources path
     *
     * @param  string $path
     * @param  string $extension [blade.php]
     *
     * @return string
     */
    public function resourcesPath(string $path = '', string $extension = 'blade.php')
    {
        return $this->resourcesPath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '')  : $path);
    }

    /**
     * Get absoulte path from routes path
     *
     * @param  string $path
     * @param  string $extension [php]
     *
     * @return string
     */
    public function routesPath(string $path = '', string $extension = 'php')
    {
        return $this->routesPath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '')  : $path);
    }

    /**
     * Get absoulte path from storage path
     *
     * @param  string $path
     * @param  string $extension
     *
     * @return string
     */
    public function storagePath(string $path = '', string $extension = '')
    {
        return $this->storagePath . ($path ? DIRECTORY_SEPARATOR . $path . ($extension ? '.' . $extension : '') : $path);
    }

    /**
     * Get static instance of current application
     *
     * @static
     * @return \Ethereal\Foundation\Application
     */
    public static function getInstance()
    {
        return self::$instance;
    }

    public function config(string $keyword, $default = null)
    {
        $keys = explode('.', $keyword);
        $name = $keys[0];

        if (!key_exists($name, $this->configs)) {
            $path = $this->configPath($name);
            $this->configs[$name] = new Configuration($path);
        }

        return $this->configs[$name]->get(...$keys) ?: $default;
    }
}
