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

        $this->command?->info("E2E admin ready: {$user->email}");
    }
}
