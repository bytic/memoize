<?php

namespace ByTIC\Memoize\Storage;

/**
 * Interface Storage
 * @package ByTIC\Memoize\Storage
 */
interface Storage
{

    public static function has(string $key): bool;

    /**
     * @param string $key
     * @param null $default
     * @return mixed
     */
    public static function get(string $key, $default = null);

    /**
     * @param string $key
     * @param $value
     */
    public static function set(string $key, $value): void;

    public static function forget(string $key): void;

    public static function flush(): void;
}