<?php

namespace Domain\Shared\VO\Interfaces;

interface Ulid
{
    public function __toString(): string;

    public static function random(): static;

    public function value(): string;

    public function equals(Ulid $other): bool;

    public static function fromPrimitives(string $value): static;
}
