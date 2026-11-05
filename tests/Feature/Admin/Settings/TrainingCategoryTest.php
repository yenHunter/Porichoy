<?php

namespace Tests\Feature\Admin\Settings;

use Tests\Support\LookupListContract;
use Tests\TestCase;

class TrainingCategoryTest extends TestCase
{
    use LookupListContract;

    protected function lookupPrefix(): string
    {
        return 'settings.training_category';
    }

    protected function lookupUseFor(): string
    {
        return 'training_category';
    }

    protected function lookupIdField(): string
    {
        return 'training_category_id';
    }

    protected function lookupCreatePayload(): array
    {
        return ['title' => 'Software Development'];
    }

    protected function lookupUpdatePayload(string $id): array
    {
        return [
            'training_category_id' => $id,
            'title'                => 'Web Development',
            'status'               => 1,
        ];
    }
}
