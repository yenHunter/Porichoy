<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
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

    /**
     * The picture is stored exactly as the user management screen stores it:
     * a 300px wide WebP on the public disk, and the response carries the URL
     * the topbar swaps in.
     */
    public function test_an_admin_can_change_their_profile_picture(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();

        $this->actingAs($user)
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'profile_picture' => UploadedFile::fake()->image('avatar.jpg', 600, 600),
            ], ['Accept' => 'application/json'])
            ->assertOk()
            ->assertJsonPath(
                'user.profile_picture_url',
                fn ($url) => str_contains($url, 'storage/uploads/users/')
            );

        $user->refresh();

        $this->assertMatchesRegularExpression('#^uploads/users/[0-9a-f-]+\.webp$#', (string) $user->profile_picture);
        Storage::disk('public')->assertExists($user->profile_picture);
    }

    public function test_a_new_picture_replaces_and_removes_the_old_file(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();
        $old = 'uploads/users/old.webp';

        Storage::disk('public')->put($old, 'old-bytes');
        $user->forceFill(['profile_picture' => $old])->save();

        $this->actingAs($user)
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'profile_picture' => UploadedFile::fake()->image('new.png', 400, 400),
            ], ['Accept' => 'application/json'])
            ->assertOk();

        $user->refresh();

        $this->assertNotSame($old, $user->profile_picture);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($user->profile_picture);
    }

    /**
     * Removing is opt-in: the stored file is deleted and the default avatar
     * comes back, both in the response and in the database.
     */
    public function test_an_admin_can_remove_their_profile_picture(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();
        $picture = 'uploads/users/current.webp';

        Storage::disk('public')->put($picture, 'bytes');
        $user->forceFill(['profile_picture' => $picture])->save();

        $this->actingAs($user)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'remove_profile_picture' => true,
            ])
            ->assertOk()
            ->assertJsonPath('user.has_picture', false)
            ->assertJsonPath(
                'user.profile_picture_url',
                fn ($url) => str_ends_with($url, 'static/icons/user.png')
            );

        $this->assertNull($user->refresh()->profile_picture);
        Storage::disk('public')->assertMissing($picture);
    }

    public function test_a_picked_picture_wins_over_the_remove_flag(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();
        $old = 'uploads/users/old.webp';

        Storage::disk('public')->put($old, 'old-bytes');
        $user->forceFill(['profile_picture' => $old])->save();

        $this->actingAs($user)
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'remove_profile_picture' => '1',
                'profile_picture' => UploadedFile::fake()->image('new.png', 300, 300),
            ], ['Accept' => 'application/json'])
            ->assertOk()
            ->assertJsonPath('user.has_picture', true);

        $user->refresh();

        $this->assertNotNull($user->profile_picture);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($user->profile_picture);
    }

    public function test_removing_a_picture_that_was_never_set_is_harmless(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();

        $this->actingAs($user)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'remove_profile_picture' => true,
            ])
            ->assertOk()
            ->assertJsonPath('user.has_picture', false);

        $this->assertNull($user->refresh()->profile_picture);
    }

    public function test_saving_without_a_picture_keeps_the_stored_one(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();
        $picture = 'uploads/users/kept.webp';

        Storage::disk('public')->put($picture, 'bytes');
        $user->forceFill(['profile_picture' => $picture])->save();

        $this->actingAs($user)
            ->putJson(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
            ])
            ->assertOk();

        $this->assertSame($picture, $user->refresh()->profile_picture);
        Storage::disk('public')->assertExists($picture);
    }

    /**
     * Validation runs before the controller, so a rejected file is never
     * written and the stored picture survives the attempt untouched.
     */
    public function test_a_rejected_picture_leaves_the_stored_file_untouched(): void
    {
        Storage::fake('public');
        $user = $this->adminUser();
        $picture = 'uploads/users/current.webp';

        Storage::disk('public')->put($picture, 'bytes');
        $user->forceFill(['profile_picture' => $picture])->save();

        $this->actingAs($user)
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'profile_picture' => UploadedFile::fake()->create('notes.pdf', 12, 'application/pdf'),
            ], ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['profile_picture']);

        $user->refresh();

        $this->assertSame($picture, $user->profile_picture);
        $this->assertNotSame('Ada', $user->first_name, 'a rejected form must not save anything');
        Storage::disk('public')->assertExists($picture);
        $this->assertSame([$picture], Storage::disk('public')->allFiles('uploads/users'));
    }

    /**
     * One reason, one message: the field states the accepted types itself
     * instead of carrying both an `image` and a `mimes` rule.
     */
    public function test_a_non_image_picture_is_rejected_with_a_single_message(): void
    {
        Storage::fake('public');

        $response = $this->actingAs($this->adminUser())
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'profile_picture' => UploadedFile::fake()->create('notes.pdf', 12, 'application/pdf'),
            ], ['Accept' => 'application/json']);

        $response->assertStatus(422)->assertJsonValidationErrors(['profile_picture']);

        $this->assertSame(
            ['The profile picture must be a JPEG, PNG, GIF or WebP image.'],
            $response->json('errors.profile_picture')
        );

        $this->assertSame([], Storage::disk('public')->allFiles('uploads/users'));
    }

    public function test_an_oversized_picture_is_rejected(): void
    {
        Storage::fake('public');

        $this->actingAs($this->adminUser())
            ->put(route('account.profile.update'), [
                'first_name' => 'Ada',
                'last_name' => 'Lovelace',
                'profile_picture' => UploadedFile::fake()->image('huge.jpg')->size(10241),
            ], ['Accept' => 'application/json'])
            ->assertStatus(422)
            ->assertJsonValidationErrors(['profile_picture']);

        $this->assertSame([], Storage::disk('public')->allFiles('uploads/users'));
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

        // One reason, one message: the hash check is the only reuse rule.
        $this->assertSame(
            ['The new password must be different from your current password.'],
            $response->json('errors.password')
        );

        $this->assertTrue(Hash::check('Current-1!', $user->refresh()->password));
    }
}
