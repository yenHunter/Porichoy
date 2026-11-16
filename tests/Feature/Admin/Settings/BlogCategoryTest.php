<?php

namespace Tests\Feature\Admin\Settings;

use App\Models\SelectType;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Tests\TestCase;

class BlogCategoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_the_blog_category_listing_renders(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.view'))
            ->assertOk();
    }

    public function test_a_blog_category_requires_a_title(): void
    {
        $this->actingAs($this->adminUser())
            ->post(route('settings.blog_category.store'), [])
            ->assertSessionHasErrors(['title']);
    }

    public function test_a_blog_category_can_be_created(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('settings.blog_category.store'), [
            'title' => 'Web Development',
            'details' => 'Posts about building for the web',
            'status' => 1,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $category = SelectType::where('use_for', 'blog_category')->firstOrFail();

        $this->assertSame('Web Development', $category->value);
        $this->assertSame('Posts about building for the web', $category->details);
        $this->assertTrue((bool) $category->status);
    }

    public function test_a_blog_category_is_active_by_default(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('settings.blog_category.store'), [
            'title' => 'Design',
        ])->assertSessionHasNoErrors();

        $this->assertTrue((bool) $this->category('Design')->status);
    }

    public function test_the_edit_endpoint_returns_the_category(): void
    {
        $category = $this->category('Design');

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.edit', $category->id))
            ->assertOk()
            ->assertJsonPath('value', 'Design');
    }

    public function test_a_blog_category_can_be_updated(): void
    {
        $category = $this->category('Design');

        $this->actingAs($this->adminUser())
            ->put(route('settings.blog_category.update'), [
                'blog_category_id' => $category->id,
                'title' => 'Product Design',
                'details' => 'Updated details',
                'status' => 0,
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $category->refresh();

        $this->assertSame('Product Design', $category->value);
        $this->assertSame('Updated details', $category->details);
        $this->assertFalse((bool) $category->status);
    }

    public function test_a_blog_category_without_posts_can_be_deleted(): void
    {
        $category = $this->category('Design');

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.delete', $category->id))
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('select_types', ['id' => $category->id]);
    }

    public function test_a_blog_category_with_posts_cannot_be_deleted(): void
    {
        $category = $this->category('Design');
        $this->createPost($category);

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.delete', $category->id))
            ->assertRedirect()
            ->assertSessionHas('error');

        $this->assertDatabaseHas('select_types', ['id' => $category->id]);
    }

    public function test_the_blog_category_order_can_be_updated(): void
    {
        $category = $this->category('Design');

        $this->actingAs($this->adminUser())
            ->post(route('settings.blog_category.sequence'), [
                'order' => [
                    ['id' => $category->id, 'sequence' => 7],
                ],
            ])
            ->assertOk()
            ->assertJson(['status' => 'success']);

        $this->assertSame(7, (int) $category->refresh()->sequence);
    }

    public function test_another_lookup_is_not_reachable_through_this_screen(): void
    {
        $training_category = SelectType::create([
            'use_for' => 'training_category',
            'value' => 'Software Development',
        ]);

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.edit', $training_category->id))
            ->assertOk()
            ->assertExactJson([]);

        $this->get(route('settings.blog_category.delete', $training_category->id))
            ->assertRedirect();

        $this->assertDatabaseHas('select_types', ['id' => $training_category->id]);
    }

    /**
     * A blog category row.
     */
    private function category(string $title = 'Design'): SelectType
    {
        return SelectType::create([
            'use_for' => 'blog_category',
            'value' => $title,
            'status' => true,
        ]);
    }

    /**
     * Insert a post that references the category.
     */
    private function createPost(SelectType $category): void
    {
        DB::table('blog_infos')->insert([
            'id' => (string) Str::uuid(),
            'blog_slug' => 'a-post',
            'blog_title' => 'A post',
            'category_id' => $category->id,
            'blog_status' => true,
            'blog_sequence' => 0,
            'view_count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
