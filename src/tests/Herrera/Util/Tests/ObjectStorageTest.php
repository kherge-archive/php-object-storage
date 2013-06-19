<?php

namespace Herrera\Util\Tests;

use Herrera\PHPUnit\TestCase;
use Herrera\Util\Test\ExampleObject;
use Herrera\Util\Test\ExampleStore;
use stdClass;

class ObjectStorageTest extends TestCase
{
    /**
     * @var ExampleStore
     */
    private $store;

    public function testAddAll()
    {
        $one = new ExampleObject();
        $two = new stdClass();
        $store = new \SplObjectStorage();
        $store->attach($two);
        $store->attach($one);

        $this->store->addAll($store);

        $this->assertTrue($this->store->contains($one));
        $this->assertFalse($this->store->contains($two));
    }

    public function testAttach()
    {
        $one = new ExampleObject();

        $this->store->attach($one);

        $this->assertTrue($this->store->contains($one));
    }

    public function testAttachUnsupported()
    {
        $one = new stdClass();

        $this->setExpectedException(
            'UnexpectedValueException',
            'The object, stdClass, is not supported.'
        );

        $this->store->attach($one);
    }

    public function testOffsetSet()
    {
        $one = new ExampleObject();

        $this->store[$one] = 123;

        $this->assertTrue($this->store->contains($one));
        $this->assertSame(123, $this->store[$one]);
    }

    public function testOffsetSetUnsupported()
    {
        $one = new stdClass();

        $this->setExpectedException(
            'UnexpectedValueException',
            'The object, stdClass, is not supported.'
        );

        $this->store[$one] = 123;
    }

    protected function setUp()
    {
        $this->store = new ExampleStore();
    }
}
