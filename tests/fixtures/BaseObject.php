<?php

namespace ByTIC\Memoize\Tests\Fixtures;

use ByTIC\Memoize\Traits\Memoizable;

/**
 * Class BaseObject
 * @package ByTIC\Memoize\Tests\Fixtures
 */
class BaseObject
{
    use Memoizable;

    /**
     * @return mixed|null
     */
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

    /**
     * @return mixed|null
     */
    public function memoizedMethod()
    {
        return $this->memoizeWithMethod(__METHOD__, 'longFunctionCall');
    }

    protected function longFunctionCall(): int
    {
        static $calls = 0;
        $calls++;
        return $calls;
    }
}
