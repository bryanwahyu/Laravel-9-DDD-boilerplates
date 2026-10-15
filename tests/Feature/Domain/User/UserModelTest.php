<?php

namespace Tests\Feature\Domain\User;

use Domain\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    use RefreshDatabase;

    public function test_factory_creates_user_with_hidden_password(): void
    {
        $user = User::factory()->create();

        $this->assertDatabaseHas('users', ['id' => $user->id]);
        $this->assertArrayNotHasKey('password', $user->toArray());
    }

    public function test_delete_is_soft(): void
    {
        $user = User::factory()->create();
        $user->delete();

        $this->assertSoftDeleted($user);
    }
}
