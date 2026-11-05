<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * reCAPTCHA verification is an outbound HTTP call to Google.
     */
    private function fakeCaptcha(bool $success = true): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => $success], 200),
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Guest pages
    |--------------------------------------------------------------------------
    */

    public function test_guest_pages_render(): void
    {
        $this->get(route('login'))->assertOk();
        $this->get(route('register.view'))->assertOk();
        $this->get(route('forgot.password.view'))->assertOk();
        $this->get(route('password.reset', 'a-token'))->assertOk();
    }

    public function test_authenticated_users_are_redirected_away_from_login(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('login'))
            ->assertRedirect();
    }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    */

    public function test_active_user_can_log_in(): void
    {
        $this->fakeCaptcha();

        $user = $this->adminUser();

        $this->post(route('login.attempt'), [
            'email' => $user->email,
            'password' => 'password',
            'g-recaptcha-response' => 'test-token',
        ])->assertRedirect(route('home'));

        $this->assertAuthenticatedAs($user);
    }

    public function test_login_requires_credentials_and_a_captcha_token(): void
    {
        $this->post(route('login.attempt'), [])
            ->assertSessionHasErrors(['email', 'password', 'g-recaptcha-response']);

        $this->assertGuest();
    }

    public function test_login_rejects_an_unknown_email(): void
    {
        $this->fakeCaptcha();

        $this->post(route('login.attempt'), [
            'email' => 'nobody@example.test',
            'password' => 'password',
            'g-recaptcha-response' => 'test-token',
        ])->assertSessionHasErrors(['error' => 'User not found']);

        $this->assertGuest();
    }

    public function test_login_rejects_a_wrong_password(): void
    {
        $this->fakeCaptcha();

        $user = $this->adminUser();

        $this->post(route('login.attempt'), [
            'email' => $user->email,
            'password' => 'not-the-password',
            'g-recaptcha-response' => 'test-token',
        ])->assertSessionHasErrors(['error' => 'Password incorrect']);

        $this->assertGuest();
    }

    public function test_login_rejects_an_inactive_account(): void
    {
        $this->fakeCaptcha();

        $user = User::factory()->inactive()->create();

        $this->post(route('login.attempt'), [
            'email' => $user->email,
            'password' => 'password',
            'g-recaptcha-response' => 'test-token',
        ])->assertSessionHasErrors(['error' => 'User not activated']);

        $this->assertGuest();
    }

    public function test_login_rejects_an_invalid_captcha(): void
    {
        $this->fakeCaptcha(success: false);

        $this->post(route('login.attempt'), [
            'email' => $this->adminUser()->email,
            'password' => 'password',
            'g-recaptcha-response' => 'bad-token',
        ])->assertSessionHasErrors(['g-recaptcha-response']);

        $this->assertGuest();
    }

    /*
    |--------------------------------------------------------------------------
    | Registration
    |--------------------------------------------------------------------------
    */

    public function test_registration_creates_an_inactive_account(): void
    {
        $this->fakeCaptcha();

        $this->post(route('register.attempt'), [
            'first_name' => 'New',
            'last_name' => 'User',
            'email' => 'new.user@example.test',
            'password' => 'a-good-password',
            'password_confirmation' => 'a-good-password',
            'g-recaptcha-response' => 'test-token',
        ])
            ->assertRedirect(route('login'))
            ->assertSessionHasErrors(['error' => 'Please contact admin for activation']);

        $user = User::where('email', 'new.user@example.test')->first();

        $this->assertNotNull($user);
        $this->assertFalse((bool) $user->user_status, 'self-registered accounts start inactive');
        $this->assertTrue(Hash::check('a-good-password', $user->password));
    }

    public function test_registration_validates_email_and_password(): void
    {
        $this->fakeCaptcha();

        $this->adminUser(['email' => 'taken@example.test']);

        $this->post(route('register.attempt'), [
            'first_name' => 'New',
            'last_name' => 'User',
            'email' => 'taken@example.test',
            'password' => 'short',
            'password_confirmation' => 'different',
            'g-recaptcha-response' => 'test-token',
        ])->assertSessionHasErrors(['email', 'password']);

        $this->assertDatabaseMissing('users', ['email' => 'new.user@example.test']);
    }

    /*
    |--------------------------------------------------------------------------
    | Logout, lock screen
    |--------------------------------------------------------------------------
    */

    public function test_logout_ends_the_session(): void
    {
        $user = $this->adminUser();

        $this->actingAs($user)->get(route('logout'))->assertRedirect(route('login'));

        $this->assertGuest();
    }

    public function test_lock_screen_flags_the_session(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('lock.screen'))
            ->assertOk();

        $this->assertTrue(session('locked'));
    }

    public function test_unlock_with_the_right_password_clears_the_flag(): void
    {
        $this->fakeCaptcha();

        $user = $this->adminUser();

        $this->actingAs($user)
            ->withSession(['locked' => true])
            ->post(route('unlock.screen'), [
                'password' => 'password',
                'g-recaptcha-response' => 'test-token',
            ])
            ->assertRedirect(route('home'));

        $this->assertFalse((bool) session('locked'));
    }

    public function test_unlock_with_a_wrong_password_fails(): void
    {
        $this->fakeCaptcha();

        $this->actingAs($this->adminUser())
            ->withSession(['locked' => true])
            ->post(route('unlock.screen'), [
                'password' => 'wrong',
                'g-recaptcha-response' => 'test-token',
            ])
            ->assertSessionHasErrors(['password' => 'Incorrect password']);
    }

    /*
    |--------------------------------------------------------------------------
    | Password reset
    |--------------------------------------------------------------------------
    */

    public function test_forgot_password_sends_a_reset_link(): void
    {
        Notification::fake();

        $user = $this->adminUser();

        $this->post(route('forgot.password.attempt'), ['email' => $user->email])
            ->assertSessionHasNoErrors();

        Notification::assertSentTo($user, ResetPassword::class);
    }

    public function test_forgot_password_rejects_an_unknown_email(): void
    {
        Notification::fake();

        $this->post(route('forgot.password.attempt'), ['email' => 'nobody@example.test'])
            ->assertSessionHasErrors(['email']);

        Notification::assertNothingSent();
    }

    public function test_password_can_be_reset_with_a_valid_token(): void
    {
        $user = $this->adminUser();
        $token = Password::createToken($user);

        $this->post(route('reset.password.attempt'), [
            'token' => $token,
            'email' => $user->email,
            'password' => 'a-brand-new-password',
            'password_confirmation' => 'a-brand-new-password',
        ])->assertRedirect(route('login'));

        $this->assertTrue(Hash::check('a-brand-new-password', $user->refresh()->password));
    }

    public function test_password_reset_rejects_an_invalid_token(): void
    {
        $user = $this->adminUser();
        $old = $user->password;

        $this->post(route('reset.password.attempt'), [
            'token' => 'not-a-real-token',
            'email' => $user->email,
            'password' => 'a-brand-new-password',
            'password_confirmation' => 'a-brand-new-password',
        ])->assertSessionHasErrors(['email']);

        $this->assertSame($old, $user->refresh()->password);
    }
}
