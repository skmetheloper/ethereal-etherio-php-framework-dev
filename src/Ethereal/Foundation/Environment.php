<?php

namespace Ethereal\Foundation;

class Environment
{
    const ENVIRONMENT_FILENAME = '.env';

    /**
     *
     * @var boolean
     */
    public $loaded = false;

    /**
     *
     * @var boolean
     */
    protected $overwrite;

    /**
     *
     * @var boolean
     */
    protected $putEnv;

    public function __construct(Application $app, bool $overwrite, bool $putEnv = false)
    {
        $envFile = $app->basePath(self::ENVIRONMENT_FILENAME);
        $this->overwrite = $overwrite;
        $this->putEnv = $putEnv;

        if (is_file($envFile)) {
            $this->parse($envFile);
            $this->loaded = true;
        }
    }

    protected function parse(string $envFile)
    {
        return $this->load(parse_ini_file($envFile));
    }

    protected function load(array $env)
    {
        foreach ($env as $name => $value) {
            $this->push($name, $value);
            if ($this->putEnv) {
                $this->put($name, $value);
            }
        }
    }

    protected function push($name, $value)
    {
        if (!key_exists($name, $_ENV)) {
            return $_ENV[$name] = $value;
        }
        if ($this->overwrite) {
            return $_ENV[$name] = $value;
        }
    }

    protected function put($name, $value)
    {
        if (!getenv($name)) {
            return putenv("{$name}={$value}");
        }
        if ($this->overwrite) {
            return putenv("{$name}={$value}");
        }
    }
}
