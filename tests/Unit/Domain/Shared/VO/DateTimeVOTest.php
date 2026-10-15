<?php

namespace Tests\Unit\Domain\Shared\VO;

use Domain\Shared\VO\DateTimeVO;
use PHPUnit\Framework\TestCase;

class DateTimeVOTest extends TestCase
{
    public function test_value_is_normalised_to_utc(): void
    {
        $dt = DateTimeVO::fromPrimitives('2024-01-02T07:30:00+07:00');

        $this->assertSame('2024-01-02 00:30:00.000000 UTC', $dt->value());
    }
}
