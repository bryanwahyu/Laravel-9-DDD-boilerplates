<?php
namespace Domain\Shared\VO;

class StringVO{
    protected string $value;

    public function __construct(string $value)
    {
        $this->value=$value;
    }
    public function __toString()
    {
        return $this->value();
    }
    public static function fromString(string $value):static
    {
        return new static($value);
    }

    public function value(): string
    {
        return $this->value;
    }

    public function equals(StringVO $otherString): bool
    {
        return $this->value === $otherString->value;
    }

    public function empty(): bool
    {
        return empty($this->value());
    }
}