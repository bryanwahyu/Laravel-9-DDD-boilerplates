<?php

namespace Tests\Unit\Domain\Shared\VO;

use Domain\Shared\Exceptions\InvalidArgumentException;
use Domain\Shared\VO\UlidVO;
use PHPUnit\Framework\TestCase;

class UlidVOTest extends TestCase
{
    public function test_random_ulid_round_trips_through_primitives(): void
    {
        $ulid = UlidVO::random();

        $this->assertTrue($ulid->equals(UlidVO::fromPrimitives($ulid->value())));
        $this->assertSame($ulid->value(), (string) $ulid);
    }

    public function test_rejects_invalid_ulid(): void
    {
        $this->expectException(InvalidArgumentException::class);

        UlidVO::fromPrimitives('not-a-ulid');
    }

    public function test_two_random_ulids_differ(): void
    {
        $this->assertFalse(UlidVO::random()->equals(UlidVO::random()));
    }
}
