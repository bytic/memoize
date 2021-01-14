<?php

namespace ByTIC\Memoize\Tests\Fixtures;

use ByTIC\Memoize\Traits\CanMemoize;

/**
 * Class BaseObject
 * @package ByTIC\Memoize\Tests\Fixtures
 */
class BaseObject
{
    use CanMemoize;

    public function memoizedFunction()
    {
        $calls = 0;
        return $this->memoize(
            __METHOD__,
            function () use ($calls) {
                $calls++;
                return $calls;
            }
        );
    }
}
