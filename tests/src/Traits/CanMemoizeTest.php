<?php

namespace ByTIC\Memoize\Tests\Traits;

use ByTIC\Memoize\Tests\AbstractTest;
use ByTIC\Memoize\Tests\Fixtures\BaseObject;

/**
 * Class CanMemoizeTest
 * @package ByTIC\Memoize\Tests\Traits
 */
class CanMemoizeTest extends AbstractTest
{
    public function test_separate_memory_same_object()
    {
        $object1 = new BaseObject();
        self::assertSame(1, $object1->memoizedFunction());
        self::assertSame(1, $object1->memoizedFunction());
        self::assertSame(1, $object1->memoizedFunction());
    }
}
