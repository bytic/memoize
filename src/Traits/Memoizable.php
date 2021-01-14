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
        return Memoizer::memoize([$this->memoizeRoot(), $key], $value);
    }

    /**
     * @param $key
     * @return bool
     */
    public function memoized($key)
    {
        return Memoizer::has([$this->memoizeRoot(), $key]);
    }
    /**
     * @param $key
     * @param $value
     * @return mixed|null
     */
    public function memoizeWithMethod($key, string $method, $arguments = [])
    {
        return Memoizer::memoize([$this->memoizeRoot(), $key], function () use ($method, $arguments) {
            return call_user_func_array([$this, $method], $arguments);
        });
    }

    protected function memoizeRoot(): string
    {
        return spl_object_hash($this);
    }
}