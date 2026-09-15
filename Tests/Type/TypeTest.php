<?php

namespace SGK\BarcodeBundle\Tests\Type;

use PHPUnit\Framework\TestCase;
use SGK\BarcodeBundle\Type\Type;

class TypeTest extends TestCase
{
    public function testInvalidArgumentException(): void
    {
        $this->expectException(\InvalidArgumentException::class);

        $type = new Type();
        $type->getDimension('Unknown Type');
    }
}
