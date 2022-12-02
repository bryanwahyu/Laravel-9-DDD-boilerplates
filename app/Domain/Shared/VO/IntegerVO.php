<?php
namespace Domain\Shared\VO;

final class IntegerVO
{
    protected int $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function __toString()
    {
        return (string) $this->value();
    }

    public static function fromInteger(int $value): static
    {
        return new static($value);
    }

    public function value(): int
    {
        return $this->value;
    }

    public function isLessThan(IntegerVO $otherInt): bool
    {
        return $this->value() < $otherInt->value();
    }
    public function isGreaterThan(IntegerVO $otherInt):bool
    {
        return $this->value() > $otherInt->value();
    }
    public function isZero(): bool
    {
        return 0 === $this->value();
    }
    public function equals(IntegerVO $otherInt): bool
    {
        return $this->value() === $otherInt->value();
    }
    public function isLessThanEquals(IntegerVO $otherInt):bool
    {
        return $this->value() <= $otherInt->value();
    }
    public function isGreaterThanEquals(IntegerVO $otherInt):bool
    {
        return $this->value() >= $otherInt->value();
    }
    public function isNegative():bool
    {
        return $this->value() < 0;
    }

}

