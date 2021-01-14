<?php

namespace ByTIC\Memoize\Tests;

use ByTIC\Memoize\Memoizer;

/**
 * Class MemoizerTest
 * @package ByTIC\Memoize\Tests
 */
class MemoizerTest extends AbstractTest
{
    public function test_get_with_default()
    {
        self::assertSame('default', Memoizer::get('dnx', 'default'));
    }

    public function test_memoize()
    {
        $calls = 0;
        $callback = function () use ($calls) {
            $calls++;
            return $calls;
        };
        Memoizer::memoize('test', $callback);

        self::assertSame(1, Memoizer::memoize('test', $callback));
        self::assertSame(1, Memoizer::memoize('test', $callback));
        self::assertSame(1, Memoizer::memoize('test', $callback));
    }

    public function test_set_closure()
    {
        $calls = 0;
        $callback = function () use ($calls) {
            $calls++;
            return $calls;
        };
        Memoizer::set('test', $callback);

        self::assertSame(1, Memoizer::get('test'));
        self::assertSame(1, Memoizer::get('test'));
        self::assertSame(1, Memoizer::get('test'));
    }
}