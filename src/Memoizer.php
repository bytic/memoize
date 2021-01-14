<?php

namespace ByTIC\Memoize;

use ByTIC\Memoize\Storage\Memory;

/**
 * Class Memoizer
 * @package ByTIC\Memoize
 */
class Memoizer
{
    protected static $storage = Memory::class;

    /**
     * @param $key
     * @param $callback
     * @return mixed|null
     */
    public static function memoize($key, $callback)
    {
        if (!static::has($key)) {
            return static::set($key, $callback);
        }
        return static::get($key, $callback);
    }

    /**
     * @param $key
     * @param null $default
     * @return mixed
     */
    public static function get($key, $default = null)
    {
        $key = static::formatKey( $key);
        if (!static::has($key)) {
            return $default;
        }
        $result = static::runStorageMethod('get', [$key]);
        if ($result instanceof \Closure) {
            $result = $result();
            static::set($key, $result);
        }
        return $result;
    }

    /**
     * @param $key
     * @return mixed
     */
    public static function has($key)
    {
        $key = static::formatKey( $key);
        return static::runStorageMethod('has', [$key]);
    }

    /**
     * @param $key
     * @param null $value
     * @return mixed
     */
    public static function set($key, $value = null)
    {
        $key = static::formatKey( $key);
        return static::runStorageMethod('set', [$key, $value]);
    }

    /**
     * @param $key
     * @return string
     */
    protected static function formatKey($key): string
    {
        if (is_array($key)) {
            return implode("-", $key);
        }
        return $key;
    }

    /**
     * @param string $method
     * @param array $arguments
     * @return mixed
     */
    protected static function runStorageMethod($method, $arguments = [])
    {
        return call_user_func_array(static::$storage . '::' . $method, $arguments);
    }
}
