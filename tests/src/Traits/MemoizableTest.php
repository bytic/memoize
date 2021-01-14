<?php

namespace ByTIC\Memoize\Tests\Traits;

use ByTIC\Memoize\Tests\AbstractTest;
use ByTIC\Memoize\Tests\Fixtures\BaseObject;

/**
 * Class MemoizableTest
 * @package ByTIC\Memoize\Tests\Traits
 */
class MemoizableTest extends AbstractTest
{
    public function test_separate_memory_same_object()
    {
        $object1 = new BaseObject();
        self::assertSame(1, $object1->memoizedFunction());
        self::assertSame(1, $object1->memoizedFunction());
        self::assertSame(1, $object1->memoizedFunction());
    }

    public function test_memoizeWithMethod()
    {
        $object1 = new BaseObject();
        self::assertSame(1, $object1->memoizedMethod());
        self::assertSame(1, $object1->memoizedMethod());
        self::assertSame(1, $object1->memoizedMethod());
    }

    public function test_unmemoize()
    {
        $object1 = new BaseObject();
        self::assertFalse($object1->memoized('test'));

        $object1->memoize('test', 2);
        self::assertTrue($object1->memoized('test'));

        $object1->unmemoize('test');
        self::assertFalse($object1->memoized('test'));
    }
}
