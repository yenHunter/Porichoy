<?php

namespace Tests\Feature\Admin\Settings;

use App\Http\Controllers\Admin\SettingsController;
use ReflectionMethod;
use Tests\TestCase;

class LookupDeleteWordingTest extends TestCase
{
    /**
     * A list that counts a relation but names no wording still gets a usable
     * sentence, so setting `with_count` alone cannot break the delete action.
     */
    public function test_the_generic_wording_is_used_when_a_list_names_none(): void
    {
        $this->assertSame(
            'This value is used by 1 record. Reassign them before deleting it.',
            $this->blockedMessage(['with_count' => 'blogs'], 1)
        );

        $this->assertSame(
            'This value is used by 4 records. Reassign them before deleting it.',
            $this->blockedMessage(['with_count' => 'blogs'], 4)
        );
    }

    /**
     * The blog category wording still wins over the default, in both forms.
     */
    public function test_a_list_wording_overrides_the_generic_sentence(): void
    {
        $lookup = [
            'with_count' => 'blogs',
            'blocked_message' => 'This category is used by %d %s. Reassign them before deleting it.',
            'blocked_noun' => ['post', 'posts'],
        ];

        $this->assertSame(
            'This category is used by 1 post. Reassign them before deleting it.',
            $this->blockedMessage($lookup, 1)
        );

        $this->assertSame(
            'This category is used by 2 posts. Reassign them before deleting it.',
            $this->blockedMessage($lookup, 2)
        );
    }

    /**
     * The wording is built by a private helper on the controller, which the
     * shared action calls; the test reaches it directly so both the default and
     * the override are pinned without inventing a lookup screen.
     *
     * @param  array<string, mixed>  $lookup
     */
    private function blockedMessage(array $lookup, int $used): string
    {
        return (new ReflectionMethod(SettingsController::class, 'blockedMessage'))
            ->invoke(null, $lookup, $used);
    }
}
