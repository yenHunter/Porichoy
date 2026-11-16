<?php

namespace Tests\Feature\Visitor;

use App\Models\ProfileInfo;
use Illuminate\Foundation\Testing\RefreshDatabase;
use RuntimeException;
use Tests\Support\SeedsStorefront;
use Tests\TestCase;

class ProfileMapTest extends TestCase
{
    use RefreshDatabase;
    use SeedsStorefront;

    /**
     * The visitor map is keyed by column name alone, so a name used by two
     * active rows would leave only one value on the site. That must surface
     * as an error rather than quietly losing a value.
     */
    public function test_a_duplicate_profile_column_name_fails_loudly(): void
    {
        $this->seedStorefrontRecords();

        $this->profileRow(ProfileInfo::BASIC, 'email', 'first@example.com');
        $this->profileRow(ProfileInfo::SOCIAL, 'email', 'second@example.com');

        $this->withoutExceptionHandling();

        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Duplicate profile column names: email');

        $this->withSession(['visitor_theme' => 'antux'])->get('/');
    }

    /**
     * An active transmission row in a second category is not a duplicate
     * when the column names differ, so the page renders normally.
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
