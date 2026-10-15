<?php

namespace Tests\Unit\Domain\Shared\VO;

use Domain\Shared\VO\IntegerVO;
use PHPUnit\Framework\TestCase;

class IntegerVOTest extends TestCase
{
    public function test_comparisons(): void
    {
        $three = IntegerVO::fromInteger(3);
        $five = IntegerVO::fromInteger(5);

        $this->assertTrue($three->isLessThan($five));
        $this->assertTrue($five->isGreaterThan($three));
        $this->assertTrue($three->isLessThanEquals(IntegerVO::fromInteger(3)));
        $this->assertTrue($five->isGreaterThanEquals(IntegerVO::fromInteger(5)));
        $this->assertTrue($three->equals(new IntegerVO(3)));
    }

    public function test_sign_checks(): void
    {
        $this->assertTrue(IntegerVO::fromInteger(0)->isZero());
        $this->assertTrue(IntegerVO::fromInteger(-1)->isNegative());
        $this->assertFalse(IntegerVO::fromInteger(1)->isNegative());
        $this->assertSame('7', (string) IntegerVO::fromInteger(7));
    }
}
