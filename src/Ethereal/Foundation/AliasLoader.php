<?php

namespace Ethereal\Foundation;

use RuntimeException;

class AliasLoader
{
    protected $loaded;

    public function make(string $alias, string $original)
    {
        if (!class_alias($original, $alias)) {
            throw new RuntimeException("Failed to create \"{$alias}\" => \"{$original}\".\r\n");
        }

        $this->loaded[] = compact('alias', 'original');
    }
}
