<?php

namespace App\Tests\Util;

use App\Util\Calculator;
use PHPUnit\Framework\TestCase;

class CalculatorTest extends TestCase
{
    public function testSquare(): void
    {
        $calculator = new Calculator();
        $result = $calculator->square(4);

        $this->assertEquals(16, $result);
    }
}
