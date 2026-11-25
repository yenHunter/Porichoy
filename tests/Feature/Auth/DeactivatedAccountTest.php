<?php

namespace Tests\Feature\Auth;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class DeactivatedAccountTest extends TestCase
{
    use RefreshDatabase;

    /**
     * The session survives a status change unless a request checks it.
     */
    public function test_a_deactivated_account_is_signed_out_on_its_next_request(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)->get(route('home'))->assertOk();

        $user->update(['user_status' => false]);

        $this->get(route('home'))
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors(['error' => 'Your account has been deactivated.']);

        $this->assertGuest();
    }

    public function test_an_active_account_stays_signed_in(): void
    {
        $this->actingAs($this->adminUser())->get(route('home'))->assertOk();
    }
}
