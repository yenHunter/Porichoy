<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

/**
 * The account the end-to-end browser tests sign in with.
 *
 * UserSeeder generates a random password that is printed once and never
 * recoverable, which a test cannot use. This seeder is deterministic and
 * idempotent instead, and is only ever run by the Playwright database
 * preparation step (see e2e/support/prepare-database.js) against its own
 * throwaway database.
 */
class E2eUserSeeder extends Seeder
{
    /**
     * Credentials the browser tests sign in with.
     */
    public const EMAIL = 'e2e@example.com';

    public const PASSWORD = 'e2e-password';

    /**
     * A second account for the account-modal suite. Its password is strong on
     * purpose: the suite rotates it through the modal and rotates it back, and
     * the strength rule would reject restoring the weaker main password.
     */
    public const ACCOUNT_EMAIL = 'e2e-account@example.com';

    public const ACCOUNT_PASSWORD = 'E2e-account#1';

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(
            ['email' => self::EMAIL],
            [
                'first_name' => 'E2E',
                'last_name' => 'Admin',
                'password' => Hash::make(self::PASSWORD),
                // Only an activated user may sign in.
                'user_status' => true,
                'profile_picture' => 'static/logo.png',
            ]
        );

        User::updateOrCreate(
            ['email' => self::ACCOUNT_EMAIL],
            [
                'first_name' => 'E2E',
                'last_name' => 'Account',
                'password' => Hash::make(self::ACCOUNT_PASSWORD),
                'user_status' => true,
                'profile_picture' => null,
            ]
        );

        $this->command?->info("E2E admin ready: {$user->email}");
    }
}
