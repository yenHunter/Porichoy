<?php

namespace Tests\Feature\Admin\Settings;

use App\Models\ProfileInfo;
use Database\Seeders\ProfileInfoSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_profile_update_writes_the_column_values(): void
    {
        $this->seed(ProfileInfoSeeder::class);
        $this->actingAs($this->adminUser());

        $row = ProfileInfo::where('column_name', 'first_name')->firstOrFail();

        $this->post(route('management.settings.profile.update'), [
            'basic' => [$row->getKey() => 'Renamed First'],
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame('Renamed First', $row->refresh()->column_value);
    }

    /**
     * The picture is posted as a file in the `basic` category, not as a value,
     * so the service has to read the file bag as well as the input bag.
     */
    public function test_the_profile_picture_upload_is_stored(): void
    {
        $this->seed(ProfileInfoSeeder::class);
        $this->actingAs($this->adminUser());
        Storage::fake('public');

        $row = ProfileInfo::where('column_name', 'profile_picture')->firstOrFail();

        $this->post(route('management.settings.profile.update'), [
            'basic' => [$row->getKey() => UploadedFile::fake()->image('avatar.jpg', 600, 600)],
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $row->refresh();

        $this->assertStringStartsWith('uploads/profile/', (string) $row->column_value);
        $this->assertStringEndsWith('.webp', (string) $row->column_value);
        Storage::disk('public')->assertExists($row->column_value);
    }

    /**
     * The profile page reads each category through ProfileInfo's constants.
     *
     * The service keys `profile_data` with those constants while the blade
     * asks for the same keys, so a constant whose value stops matching the
     * key the blade uses would render an empty form. Seeding a value into
     * every category (and printing it) fails here instead of silently.
     */
    public function test_the_profile_page_reaches_every_category_through_its_constants(): void
    {
        $this->actingAs($this->adminUser());

        // Every column the form prints, so the page renders; one of them
        // carries a value that must show up in the HTML.
        $categories = [
            ProfileInfo::BASIC => [
                ['bio', 'country_flag', 'email', 'first_name', 'headline', 'last_name', 'phone', 'profile_picture', 'website'],
                'first_name',
                'SAMPLE-BASIC-VALUE',
            ],
            ProfileInfo::PERSONAL => [
                ['date_of_birth', 'father_name', 'gender', 'languages', 'marital_status', 'mother_name', 'nationality', 'spouse_name'],
                'father_name',
                'SAMPLE-PERSONAL-VALUE',
            ],
            ProfileInfo::PRESENT_ADDRESS => [
                ['present_city', 'present_country', 'present_postal_code', 'present_state_province', 'present_street_address'],
                'present_city',
                'SAMPLE-PRESENT-VALUE',
            ],
            ProfileInfo::PERMANENT_ADDRESS => [
                ['permanent_city', 'permanent_country', 'permanent_postal_code', 'permanent_state_province', 'permanent_street_address'],
                'permanent_city',
                'SAMPLE-PERMANENT-VALUE',
            ],
            ProfileInfo::SOCIAL => [
                ['facebook', 'github', 'instagram', 'linkedin', 'researchgate', 'twitter', 'whatsapp', 'youtube'],
                'linkedin',
                'SAMPLE-SOCIAL-VALUE',
            ],
        ];

        $samples = [];

        foreach ($categories as $useFor => [$columns, $sampleColumn, $sampleValue]) {
            foreach ($columns as $column) {
                ProfileInfo::create([
                    'use_for' => $useFor,
                    'column_title' => $column,
                    'column_name' => $column,
                    'column_value' => $column === $sampleColumn ? $sampleValue : 'filler',
                    'column_status' => true,
                ]);
            }

            $samples[] = $sampleValue;
        }

        $response = $this->get(route('management.settings.profile.view'))
            ->assertOk()
            ->assertViewHas('profile_data', function (array $data): bool {
                $categories = [
                    ProfileInfo::BASIC,
                    ProfileInfo::PERSONAL,
                    ProfileInfo::ADDRESS,
                    ProfileInfo::PRESENT_ADDRESS,
                    ProfileInfo::PERMANENT_ADDRESS,
                    ProfileInfo::SOCIAL,
                ];

                foreach ($categories as $category) {
                    if (! array_key_exists($category, $data)) {
                        return false;
                    }
                }

                return true;
            });

        // `address` has no fields of its own on the form, so the five
        // categories with inputs are checked by their rendered value.
        foreach ($samples as $value) {
            $response->assertSee($value);
        }
    }
}
