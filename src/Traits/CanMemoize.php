<?php

namespace ByTIC\Memoize\Traits;

use ByTIC\Memoize\Memoizer;

/**
 * Trait CanMemoize
 * @package ByTIC\Memoize\Traits
 */
trait CanMemoize
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