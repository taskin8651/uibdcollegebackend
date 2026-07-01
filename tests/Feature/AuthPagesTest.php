<?php

namespace Tests\Feature;

use Tests\TestCase;

class AuthPagesTest extends TestCase
{
    public function test_login_page_loads_with_frontend_theme(): void
    {
        $this->get(route('login'))
            ->assertOk()
            ->assertSee('Secure Admin Portal')
            ->assertSee('Back to website')
            ->assertSee(route('frontend.home'));
    }

    public function test_register_page_loads_with_frontend_theme(): void
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSee('Account Access')
            ->assertSee('Create access for the college CMS')
            ->assertSee(route('login'));
    }
}
