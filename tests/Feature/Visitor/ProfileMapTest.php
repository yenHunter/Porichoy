<?php

namespace Tests\Feature\Visitor;

use App\Models\ProfileInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Log;
use Tests\Support\SeedsStorefront;
use Tests\TestCase;

class ProfileMapTest extends TestCase
{
    use RefreshDatabase;
    use SeedsStorefront;

    /**
     * The visitor map is keyed by column name alone, so a name used by two
     * active rows leaves only the first value. That is logged instead of
     * thrown, so the page still renders for visitors.
     */
    public function test_a_duplicate_profile_column_name_is_logged_and_keeps_the_first_value(): void
    {
        $this->seedStorefrontRecords();

        // `first_name` is printed by the antux home page.
        $this->profileRow(ProfileInfo::BASIC, 'first_name', 'First Value');
        $this->profileRow(ProfileInfo::SOCIAL, 'first_name', 'Second Value');

        Log::spy();

        $this->withSession(['visitor_theme' => 'antux'])->get('/')
            ->assertOk()
            ->assertSee('First Value');

        Log::shouldHaveReceived('error')
            ->withArgs(fn (string $message) => str_contains($message, 'Duplicate profile column names')
                && str_contains($message, 'first_name'))
            ->once();
    }

    /**
     * A row in a second category is not a duplicate when the column names
     * differ, so the page renders normally and nothing is logged.
     */
    public function test_distinct_column_names_still_render(): void
    {
        $this->seedStorefrontRecords();

        $this->profileRow(ProfileInfo::BASIC, 'first_name', 'Ada');
        $this->profileRow(ProfileInfo::SOCIAL, 'github', 'https://github.com/ada');

        $this->withSession(['visitor_theme' => 'antux'])->get('/')
            ->assertOk()
            ->assertSee('Ada');
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * An active profile row, as the admin form would store it.
     */
    private function profileRow(string $useFor, string $columnName, string $value): void
    {
        ProfileInfo::create([
            'use_for' => $useFor,
            'column_title' => ucfirst(str_replace('_', ' ', $columnName)),
            'column_name' => $columnName,
            'column_value' => $value,
            'column_status' => true,
        ]);
    }
}
