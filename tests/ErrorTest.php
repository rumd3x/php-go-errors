<?php

use Rumd3x\Errors\Error;
use PHPUnit\Framework\TestCase;
use Rumd3x\Errors\ErrorInterface;

final class ErrorTest extends TestCase
{
    public function testConstruct()
    {
        $error = new Error('error message');
        $this->assertInstanceOf(Error::class, $error);
    }

    public function testNew()
    {
        $error = Error::new('error message');
        $this->assertInstanceOf(Error::class, $error);
        $this->assertInstanceOf(ErrorInterface::class, $error);
    }

    public function testNewf()
    {
        $error = Error::new('error message');
        $this->assertInstanceOf(Error::class, $error);
        $this->assertInstanceOf(ErrorInterface::class, $error);
    }

    public function testError()
    {
        $error = new Error('error message');
        $this->assertIsString($error->error());
        $this->assertEquals($error->error(), 'error message');

        $error = Error::new('error message');
        $this->assertIsString($error->error());
        $this->assertEquals($error->error(), 'error message');

        $error = Error::newf('%s %s', 'error', 'message');
        $this->assertIsString($error->error());
        $this->assertEquals($error->error(), 'error message');
    }

    public function testCast()
    {
        $error = new Error('error message');
        $this->assertIsString((string) $error);
        $this->assertEquals((string) $error, 'error message');

        $error = Error::new('error message');
        $this->assertIsString((string) $error);
        $this->assertEquals((string) $error, 'error message');

        $error = Error::newf('%s %s', 'error', 'message');
        $this->assertIsString((string) $error);
        $this->assertEquals((string) $error, 'error message');
    }
}
