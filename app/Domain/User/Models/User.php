<?php

namespace Domain\User\Models;

use Database\Factories\UserFactory;
use Domain\Shared\Models\AuthModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends AuthModel
{
    use HasFactory;

    protected static function newFactory(): UserFactory
    {
        return UserFactory::new();
    }
}
