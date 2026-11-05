<?php

namespace Tests\Feature\Admin\Settings;

use Tests\Support\LookupListContract;
use Tests\TestCase;

class LocationTypeTest extends TestCase
{
    use LookupListContract;

    protected function lookupPrefix(): string
    {
        return 'settings.location_type';
    }

    protected function lookupUseFor(): string
    {
        return 'location_type';
    }

    protected function lookupIdField(): string
    {
        return 'location_type_id';
    }

    protected function lookupCreatePayload(): array
    {
        return ['title' => 'Remote', 'details' => 'Work from home'];
    }

    protected function lookupUpdatePayload(string $id): array
    {
        return [
            'location_type_id' => $id,
            'title' => 'Hybrid',
            'details' => 'Two days in office',
        ];
    }
}
