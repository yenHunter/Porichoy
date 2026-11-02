<?php

namespace Tests\Feature\Admin;

use App\Models\BlogInfo;
use App\Models\ClientInfo;
use App\Models\ColumnSettings;
use App\Models\EducationInfo;
use App\Models\ExperienceInfo;
use App\Models\ProjectInfo;
use App\Models\ResearchInfo;
use App\Models\SelectType;
use App\Models\ServiceInfo;
use App\Models\SkillInfo;
use App\Models\TestimonialInfo;
use App\Models\TrainingInfo;
use Closure;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class AdminCrudContractTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Every admin CRUD module: route prefix, id field, model, the field whose
     * value proves an update ran, its sequence column, a valid payload and the
     * fields that must be rejected when missing.
     *
     * @return array<string, array<string, mixed>>
     */
    public static function moduleProvider(): array
    {
        return [
            'education' => [
                'prefix'       => 'module.education',
                'id_field'     => 'education_id',
                'model'        => EducationInfo::class,
                'title_field'  => 'education_degree',
                'sequence'     => 'education_sequence',
                'payload'      => fn () => [
                    'education_degree'    => 'BSc',
                    'education_institute' => 'Test University',
                    'start_date'          => '2018-01-01',
                ],
                'updated_title' => 'MSc',
                'required'      => ['education_degree', 'education_institute', 'start_date'],
            ],
            'experience' => [
                'prefix'       => 'module.experience',
                'id_field'     => 'experience_id',
                'model'        => ExperienceInfo::class,
                'title_field'  => 'employment_position',
                'sequence'     => 'employment_sequence',
                'payload'      => fn () => [
                    'employment_position'     => 'Developer',
                    'employment_type'         => self::selectType('employment_type'),
                    'employment_organization' => 'Test Organisation',
                    'start_date'              => '2020-01-01',
                ],
                'updated_title' => 'Senior Developer',
                'required'      => ['employment_position', 'employment_type', 'employment_organization', 'start_date'],
            ],
            'research' => [
                'prefix'       => 'module.research',
                'id_field'     => 'research_id',
                'model'        => ResearchInfo::class,
                'title_field'  => 'research_title',
                'sequence'     => 'research_sequence',
                'payload'      => fn () => [
                    'research_source'   => self::selectType('research_source'),
                    'research_category' => 'Computer Science',
                    'research_title'    => 'A Test Paper',
                ],
                'updated_title' => 'A Revised Paper',
                'required'      => ['research_source', 'research_category', 'research_title'],
            ],
            'training' => [
                'prefix'       => 'module.training',
                'id_field'     => 'training_id',
                'model'        => TrainingInfo::class,
                'title_field'  => 'training_title',
                'sequence'     => 'training_sequence',
                'payload'      => fn () => [
                    'training_title'     => 'Laravel Bootcamp',
                    'training_category'  => self::selectType('training_category'),
                    'training_institute' => 'Test Institute',
                ],
                'updated_title' => 'Laravel Bootcamp 2',
                'required'      => ['training_title', 'training_category', 'training_institute'],
            ],
            'blog' => [
                'prefix'       => 'module.blog',
                'id_field'     => 'blog_id',
                'model'        => BlogInfo::class,
                'title_field'  => 'blog_title',
                'sequence'     => 'blog_sequence',
                'payload'      => fn () => [
                    'blog_title'   => 'First Post',
                    'blog_excerpt' => 'An excerpt',
                ],
                'updated_title' => 'First Post Revised',
                'required'      => ['blog_title'],
            ],
            'service' => [
                'prefix'       => 'element.service',
                'id_field'     => 'service_id',
                'model'        => ServiceInfo::class,
                'title_field'  => 'service_title',
                'sequence'     => 'service_sequence',
                'payload'      => fn () => [
                    'service_title' => 'Branding',
                ],
                'updated_title' => 'Branding & Identity',
                'required'      => ['service_title'],
            ],
            'project' => [
                'prefix'       => 'element.project',
                'id_field'     => 'project_id',
                'model'        => ProjectInfo::class,
                'title_field'  => 'project_title',
                'sequence'     => 'project_sequence',
                'payload'      => fn () => [
                    'project_title' => 'Acme Revamp',
                    'start_date'    => '2024-01-01',
                ],
                'updated_title' => 'Acme Revamp 2',
                'required'      => ['project_title', 'start_date'],
            ],
            'skill' => [
                'prefix'       => 'element.skill',
                'id_field'     => 'skill_id',
                'model'        => SkillInfo::class,
                'title_field'  => 'skill_title',
                'sequence'     => 'skill_sequence',
                'payload'      => fn () => [
                    'skill_title' => 'Laravel',
                    'skill_score' => 90,
                ],
                'updated_title' => 'Laravel 12',
                'required'      => ['skill_title'],
            ],
            'client' => [
                'prefix'       => 'element.client',
                'id_field'     => 'client_id',
                'model'        => ClientInfo::class,
                'title_field'  => 'client_name',
                'sequence'     => 'client_sequence',
                'payload'      => fn () => [
                    'client_name'       => 'Acme Ltd',
                    'client_email'      => 'acme@example.test',
                    'organization_logo' => UploadedFile::fake()->image('logo.png', 300, 300),
                ],
                'updated_title' => 'Acme Limited',
                'required'      => ['client_name', 'client_email', 'organization_logo'],
            ],
            'testimonial' => [
                'prefix'       => 'element.testimonial',
                'id_field'     => 'testimonial_id',
                'model'        => TestimonialInfo::class,
                'title_field'  => 'testimonial_title',
                'sequence'     => 'testimonial_sequence',
                'payload'      => fn () => [
                    'client_id'           => self::clientId(),
                    'testimonial_title'   => 'Great work',
                    'testimonial_details' => 'They delivered on time.',
                    'testimonial_review'  => 5,
                ],
                'updated_title' => 'Outstanding work',
                'required'      => ['client_id', 'testimonial_title', 'testimonial_details', 'testimonial_review'],
            ],
        ];
    }

    /**
     * The full CRUD contract every admin module shares.
     */
    #[DataProvider('moduleProvider')]
    public function test_admin_module_crud_contract(
        string $prefix,
        string $id_field,
        string $model,
        string $title_field,
        string $sequence,
        Closure $payload,
        string $updated_title,
        array $required
    ): void {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        // listing
        $this->get(route("{$prefix}.view"))->assertOk();

        // required-field validation
        $this->post(route("{$prefix}.store"), [])
            ->assertSessionHasErrors($required);

        // store
        $fields = $payload();

        $this->post(route("{$prefix}.store"), $fields)
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $record = $model::query()->first();
        $this->assertNotNull($record, "{$prefix}: store created no record");
        $this->assertSame($fields[$title_field], $record->{$title_field});

        // edit (JSON payload for the row)
        $this->get(route("{$prefix}.edit", $record->getKey()))
            ->assertOk()
            ->assertJsonPath($title_field, $fields[$title_field]);

        // update
        $this->put(route("{$prefix}.update"), array_merge($fields, [
            $id_field    => $record->getKey(),
            $title_field => $updated_title,
        ]))
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertSame(
            $updated_title,
            $record->refresh()->{$title_field},
            "{$prefix}: update did not persist {$title_field}"
        );

        // sequence
        $this->post(route("{$prefix}.sequence"), [
            'order' => [['id' => $record->getKey(), 'sequence' => 7]],
        ])
            ->assertOk()
            ->assertJson(['status' => 'success']);

        $this->assertSame(7, (int) $record->refresh()->{$sequence});

        // delete
        $this->get(route("{$prefix}.delete", $record->getKey()))->assertRedirect();

        $this->assertDatabaseMissing($record->getTable(), ['id' => $record->getKey()]);
    }

    /**
     * The module group also exposes a column-visibility settings panel.
     *
     * @return array<string, array{0: string, 1: string, 2: string}>
     */
    public static function settingsProvider(): array
    {
        return [
            'education' => ['module.education', 'education', 'education_degree'],
            'experience' => ['module.experience', 'experience', 'employment_position'],
            'research' => ['module.research', 'research', 'research_title'],
            'training' => ['module.training', 'training', 'training_title'],
            'blog' => ['module.blog', 'blog', 'blog_title'],
        ];
    }

    #[DataProvider('settingsProvider')]
    public function test_module_column_settings_toggle(string $prefix, string $module, string $column): void
    {
        $this->actingAs($this->adminUser());

        $setting                = new ColumnSettings();
        $setting->module        = $module;
        $setting->column_title  = 'Test column';
        $setting->column_name   = $column;
        $setting->visibility    = false;
        $setting->save();

        // checked column becomes visible
        $this->put(route("{$prefix}.settings.update"), [$column => 1])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertTrue((bool) $setting->refresh()->visibility);

        // omitted column is hidden again
        $this->put(route("{$prefix}.settings.update"), [])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertFalse((bool) $setting->refresh()->visibility);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * A lookup value in select_types, returning its id.
     */
    private static function selectType(string $useFor): int
    {
        $select          = new SelectType();
        $select->use_for = $useFor;
        $select->value   = 'Test value';
        $select->save();

        return (int) $select->getKey();
    }

    /**
     * A client row (testimonials hang off one), returning its id.
     */
    private static function clientId(): string
    {
        $client                    = new ClientInfo();
        $client->client_name       = 'Acme Ltd';
        $client->client_email      = 'acme@example.test';
        $client->organization_logo = 'uploads/client/organization/logo.webp';
        $client->save();

        return (string) $client->getKey();
    }
}
