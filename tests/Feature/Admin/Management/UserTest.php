<?php

namespace Tests\Feature\Admin\Management;

use App\Models\User;
use App\Notifications\WelcomeSetPasswordNotification;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_listing_hides_the_super_admin_but_keeps_the_other_users(): void
    {
        $superAdmin = $this->adminUser();
        $operator = $this->adminUser();

        $this->actingAs($superAdmin)
            ->get(route('management.user.view'))
            ->assertOk()
            ->assertViewHas('user_list', function ($users) use ($superAdmin, $operator) {
                return $users->doesntContain('id', $superAdmin->getKey())
                    && $users->contains('id', $operator->getKey());
            });
    }

    public function test_storing_a_user_creates_the_account_and_sends_the_welcome_mail(): void
    {
        Notification::fake();

        $this->actingAs($this->adminUser());

        $this->post(route('management.user.store'), [
            'first_name' => 'New',
            'last_name' => 'Operator',
            'email' => 'operator@example.test',
            'user_status' => true,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $user = User::where('email', 'operator@example.test')->first();

        $this->assertNotNull($user, 'the user was not created');
        $this->assertNotSame('', (string) $user->password, 'a random password must be set');
        $this->assertTrue((bool) $user->user_status);

        Notification::assertSentTo($user, WelcomeSetPasswordNotification::class);
    }

    public function test_storing_a_user_rejects_missing_fields_and_duplicate_email(): void
    {
        $this->actingAs($this->adminUser(['email' => 'taken@example.test']));

        $this->post(route('management.user.store'), [])
            ->assertSessionHasErrors(['first_name', 'last_name', 'email']);

        $this->post(route('management.user.store'), [
            'first_name' => 'New',
            'last_name' => 'Operator',
            'email' => 'taken@example.test',
        ])->assertSessionHasErrors(['email']);
    }

    public function test_a_user_can_be_edited_and_updated(): void
    {
        $admin = $this->adminUser();
        $target = $this->adminUser();

        $this->actingAs($admin)
            ->get(route('management.user.edit', $target->getKey()))
            ->assertOk()
            ->assertJsonPath('email', $target->email);

        $this->actingAs($admin)
            ->put(route('management.user.update'), [
                'user_id' => $target->getKey(),
                'first_name' => 'Renamed',
                'last_name' => 'Person',
                'email' => 'renamed@example.test',
                'user_status' => false,
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $target->refresh();

        $this->assertSame('Renamed', $target->first_name);
        $this->assertSame('renamed@example.test', $target->email);
        $this->assertFalse((bool) $target->user_status);
    }

    public function test_updating_a_user_ignores_its_own_email(): void
    {
        $admin = $this->adminUser();

        $this->actingAs($admin)
            ->put(route('management.user.update'), [
                'user_id' => $admin->getKey(),
                'first_name' => 'Same',
                'last_name' => 'Email',
                'email' => $admin->email,
            ])
            ->assertSessionHasNoErrors();
    }

    public function test_a_user_can_be_deleted(): void
    {
        $admin = $this->adminUser();
        $target = $this->adminUser();

        $this->actingAs($admin)
            ->get(route('management.user.delete', $target->getKey()))
            ->assertRedirect();

        $this->assertDatabaseMissing('users', ['id' => $target->getKey()]);
    }
}
