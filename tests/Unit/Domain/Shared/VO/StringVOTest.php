<?php

namespace Tests\Unit\Domain\Shared\VO;

use Domain\Shared\VO\StringVO;
use PHPUnit\Framework\TestCase;

class StringVOTest extends TestCase
{
    public function test_equality_is_by_value(): void
    {
        $this->assertTrue(StringVO::fromString('gudang')->equals(new StringVO('gudang')));
        $this->assertFalse(StringVO::fromString('gudang')->equals(new StringVO('Gudang')));
    }

    public function test_empty(): void
    {
        $this->assertTrue(StringVO::fromString('')->empty());
        $this->assertFalse(StringVO::fromString('a')->empty());
    }
}
