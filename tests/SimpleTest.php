<?php

use App\TestClass;
use PHPUnit\Framework\TestCase;

class SimpleTest extends TestCase
{
    public function test01()
    {
        /** @var TestClass $myTestClass */
        $myTestClass = new TestClass();

        $this->assertEquals($myTestClass->getTestString(), "hello test");
    }

}