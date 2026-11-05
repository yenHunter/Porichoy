<?php

namespace Tests\Feature\Admin\Settings;

use Tests\Support\LookupListContract;
use Tests\TestCase;

class EmploymentTypeTest extends TestCase
{
    use LookupListContract;

    protected function lookupPrefix(): string
    {
        return 'settings.employment_type';
    }

    protected function lookupUseFor(): string
    {
        return 'employment_type';
    }

    protected function lookupIdField(): string
    {
        return 'employment_type_id';
    }

    protected function lookupCreatePayload(): array
    {
        return ['title' => 'Contract'];
    }

    protected function lookupUpdatePayload(string $id): array
    {
        return [
            'employment_type_id' => $id,
            'title'              => 'Fixed term',
        ];
    }
}
