<?php

namespace ByTIC\Memoize\Traits;

use ByTIC\Memoize\Memoizer;

/**
 * Trait Memoizable
 * @package ByTIC\Memoize\Traits
 */
trait Memoizable
{
    /**
     * @param $key
     * @param $value
     * @return mixed|null
     */
    public function memoize($key, $value)
    {
        Memoizer::set([$this->memoizeRoot(), $key], $value);
        return Memoizer::get([$this->memoizeRoot(), $key]);
    }

    protected function memoizeRoot(): string
    {
        return spl_object_hash($this);
    }
}