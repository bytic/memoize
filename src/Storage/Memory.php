<?php

namespace ByTIC\Memoize\Storage;

/**
 * Class Memory
 * @package ByTIC\Memoize\Storage
 */
class Memory extends AbstractStorage
{
    protected static $data = [];

    public static function has(string $key): bool
    {
        return array_key_exists($key, self::$data);
    }

    /**
     * @inheritDoc
     */
    public static function get(string $key, $default = null)
    {
        if (!static::has($key)) {
            return $default;
        }
        return self::$data[$key];
    }

    /**
     * @inheritDoc
     */
    public static function set(string $key, $value): void
    {
        self::$data[$key] = $value;
    }

    /**
     * @inheritDoc
     */
    public static function forget(string $key): void
    {
        if (static::has($key)) {
            unset(self::$data[$key]);
        }
    }

    public static function flush(): void
    {
        self::$data = [];
    }
}