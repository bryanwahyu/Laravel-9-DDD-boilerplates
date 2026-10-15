<?php

namespace Domain\Shared\VO;

use Domain\Shared\VO\Interfaces\DateTime as InterfacesDateTime;
use DateTimeImmutable;
use DateTimeZone;

final class DateTimeVO extends DateTimeImmutable implements InterfacesDateTime
{
    public function value(): string
    {
        return $this->setTimezone(new DateTimeZone(static::DATETIME_ZONE))->format(static::DATETIME_FORMAT);
    }

    public static function fromPrimitives(string $datetime): static
    {
        return new static($datetime);
    }

    public static function now(): static
    {
        return new static('now');
    }
}
