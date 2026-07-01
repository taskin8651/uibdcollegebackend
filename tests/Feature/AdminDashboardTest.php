<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    public function test_admin_dashboard_loads(): void
    {
        $user = User::first() ?: User::factory()->create();

        $this->actingAs($user)
            ->get(route('admin.home'))
            ->assertOk()
            ->assertSee('College CMS Command Center');
    }
}
