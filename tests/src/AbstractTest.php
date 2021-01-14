<?php

namespace ByTIC\Memoize\Tests;

use Mockery as m;
use PHPUnit\Framework\TestCase;

/**
 * Class AbstractTest
 * @package ByTIC\Memoize\Tests
 */
abstract class AbstractTest extends TestCase
{
    protected function tearDown(): void
    {
        parent::tearDown();
        m::close();
    }
}
