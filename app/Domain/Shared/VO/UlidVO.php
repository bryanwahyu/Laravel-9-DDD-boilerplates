<?php

namespace Domain\Shared\VO;

use Domain\Shared\Exceptions\InvalidArgumentException;
use Stringable;
use Symfony\Component\Uid\Ulid;
use Domain\Shared\VO\Interfaces\Ulid as InterfacesUlid;

final class UlidVO implements Stringable, InterfacesUlid
{
    private string $value;

    final public function __construct(string $value)
    {
        $this->guard($value);

        $this->value = $value;
    }

    public function __toString(): string
    {
        return $this->value;
    }

    private function guard(string $value): void
    {
        if (false === Ulid::isValid($value)) {
            throw new InvalidArgumentException(sprintf('Value <%s> is not a valid ULID', $value));
        }
    }

    public static function random(): static
    {
        return new static((new Ulid())->__toString());
    }

    public static function fromPrimitives(string $value): static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(InterfacesUlid $other): bool
    {
        return $this->value() === $other->value();
    }
}
