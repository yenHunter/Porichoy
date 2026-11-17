<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AccountTest extends TestCase
{
    use RefreshDatabase;

    /*
    |--------------------------------------------------------------------------
    | Profile
    |--------------------------------------------------------------------------
    */

    public function test_an_admin_can_update_their_own_names(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
            ])
            ->assertOk()
            ->assertJsonPath('user.full_name', 'Ada Lovelace');

        $user->refresh();

        $this->assertSame('Ada', $user->first_name);
        $this->assertSame('Lovelace', $user->last_name);
    }

    /**
     * The address is displayed but never submitted; posting one must not
     * change it either.
     */
    public function test_the_profile_form_cannot_change_the_email_address(): void
    {
        $user = $this->adminUser(['email' => 'owner@example.test']);

        $this->actingAs($user)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'email' => 'someone-else@example.test',
            ])
            ->assertOk();

        $this->assertSame('owner@example.test', $user->refresh()->email);
    }

    public function test_the_profile_requires_both_names(): void
    {
        $this->actingAs($this->adminUser())
            ->putJson(route('account.profile.update'), ['first_name' => '', 'last_name' => ''])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['first_name', 'last_name']);
    }

    public function test_the_profile_endpoint_only_touches_the_signed_in_admin(): void
    {
        $actor = $this->adminUser();
        $other = $this->adminUser();
        $otherName = $other->first_name;

        $this->actingAs($actor)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Self',
                'last_name' => 'Only',
            ])
            ->assertOk();

        $this->assertSame('Self', $actor->refresh()->first_name);
        $this->assertSame($otherName, $other->refresh()->first_name);
    }

    /*
    |--------------------------------------------------------------------------
    | Password
    |--------------------------------------------------------------------------
    */

    public function test_an_admin_can_change_their_password(): void
    {
        $user = $this->adminUser();
        $user->forceFill(['password' => Hash::make('Current-1!')])->save();

        $this->actingAs($user)
            ->putJson(route('account.password.update'), [
                'current_password' => 'Current-1!',
                'password' => 'Brand-New2!',
                'password_confirmation' => 'Brand-New2!',
            ])
            ->assertOk();

        $this->assertTrue(Hash::check('Brand-New2!', $user->refresh()->password));
    }

    public function test_the_current_password_must_match(): void
    {
        $user = $this->adminUser();
        $user->forceFill(['password' => Hash::make('Current-1!')])->save();

        $this->actingAs($user)
            ->putJson(route('account.password.update'), [
                'current_password' => 'Not-My-Password1!',
                'password' => 'Brand-New2!',
                'password_confirmation' => 'Brand-New2!',
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['current_password']);

        $this->assertTrue(Hash::check('Current-1!', $user->refresh()->password));
    }

    /**
     * The same bar the modal shows: length, mixed case, a number and a symbol.
     */
    public function test_a_weak_password_is_rejected(): void
    {
        $user = $this->adminUser();
        $user->forceFill(['password' => Hash::make('Current-1!')])->save();

        $this->actingAs($user)
            ->putJson(route('account.password.update'), [
                'current_password' => 'Current-1!',
                'password' => 'weakpassword',
                'password_confirmation' => 'weakpassword',
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['password']);

        $this->assertTrue(Hash::check('Current-1!', $user->refresh()->password));
    }

    public function test_the_new_password_must_be_confirmed(): void
    {
        $user = $this->adminUser();
        $user->forceFill(['password' => Hash::make('Current-1!')])->save();

        $this->actingAs($user)
            ->putJson(route('account.password.update'), [
                'current_password' => 'Current-1!',
                'password' => 'Brand-New2!',
                'password_confirmation' => 'Brand-New3!',
            ])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['password']);
    }

    public function test_the_current_password_cannot_be_reused(): void
    {
        $user = $this->adminUser();
        $user->forceFill(['password' => Hash::make('Current-1!')])->save();

        $response = $this->actingAs($user)
            ->putJson(route('account.password.update'), [
                'current_password' => 'Current-1!',
                'password' => 'Current-1!',
                'password_confirmation' => 'Current-1!',
            ]);

        $response->assertStatus(422)->assertJsonValidationErrors(['password']);

        $this->assertContains(
            'The new password must be different from your current password.',
            $response->json('errors.password')
        );

        $this->assertTrue(Hash::check('Current-1!', $user->refresh()->password));
    }
}
