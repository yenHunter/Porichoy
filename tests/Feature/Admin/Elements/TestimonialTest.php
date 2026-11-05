<?php

namespace Tests\Feature\Admin\Elements;

use App\Models\TestimonialInfo;
use Illuminate\Support\Str;
use Tests\Support\AdminModuleContract;
use Tests\TestCase;

class TestimonialTest extends TestCase
{
    use AdminModuleContract;

    protected function modulePrefix(): string
    {
        return 'element.testimonial';
    }

    protected function moduleIdField(): string
    {
        return 'testimonial_id';
    }

    protected function moduleModel(): string
    {
        return TestimonialInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'testimonial_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'testimonial_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'client_id'           => $this->clientRecord()->getKey(),
            'testimonial_title'   => 'Great work',
            'testimonial_details' => 'They delivered on time.',
            'testimonial_review'  => 5,
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['client_id', 'testimonial_title', 'testimonial_details', 'testimonial_review'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'Outstanding work';
    }

    public function test_the_client_must_exist(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('element.testimonial.store'), array_merge($this->modulePayload(), [
            'client_id' => (string) Str::uuid(),
        ]))->assertSessionHasErrors(['client_id']);
    }

    public function test_the_review_is_between_one_and_five(): void
    {
        $this->actingAs($this->adminUser());

        foreach ([0, 6] as $score) {
            $this->post(route('element.testimonial.store'), array_merge($this->modulePayload(), [
                'testimonial_review' => $score,
            ]))->assertSessionHasErrors(['testimonial_review']);
        }
    }
}
