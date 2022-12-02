<?php
namespace Domain\Shared\Actions;

abstract class Action{
    public static function handle():static
    {
        return app(static::class);
    }
}
