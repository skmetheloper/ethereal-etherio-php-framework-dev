<?php

namespace Ethereal\Foundation;

class Configuration
{
    /**
     * @var stirng
     */
    protected $path;

    /**
     * @var array
     */
    protected $configs;

    public function __construct(string $path)
    {
        if (file_exists($this->path = $path)) {
            $this->load(require $path);
        }
    }

    protected function load(?array $configs)
    {
        if ($configs) {
            $this->configs = $configs;
        }
    }

    public function get(string $_ignore, string ...$keys)
    {
        if (!$this->configs) {
            return null;
        }

        $config = $this->configs;

        foreach ($keys as $key) {
            if (!is_array($config)) {
                return $config;
            }

            $config = $config[$key] ?? null;
        }

        return $config;
    }

    public function getAll()
    {
        return $this->configs;
    }
}
