<?php

namespace Tests\Feature\Admin\Settings;

use App\Models\BlogCategory;
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

    public function test_a_blog_category_requires_a_name(): void
    {
        $this->actingAs($this->adminUser())
            ->post(route('settings.blog_category.store'), [])
            ->assertSessionHasErrors(['category_name']);
    }

    public function test_a_blog_category_can_be_created(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('settings.blog_category.store'), [
            'category_name' => 'Web Development',
            'category_description' => 'Posts about building for the web',
            'category_status' => 1,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $category = BlogCategory::firstOrFail();

        $this->assertSame('Web Development', $category->category_name);
        $this->assertSame('Posts about building for the web', $category->category_description);
        $this->assertTrue($category->category_status);
    }

    public function test_a_blog_category_is_active_by_default(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('settings.blog_category.store'), [
            'category_name' => 'Design',
        ])->assertSessionHasNoErrors();

        $this->assertTrue(BlogCategory::firstOrFail()->category_status);
    }

    public function test_the_edit_endpoint_returns_the_category(): void
    {
        $category = BlogCategory::create(['category_name' => 'Design']);

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.edit', $category->getKey()))
            ->assertOk()
            ->assertJsonPath('category_name', 'Design');
    }

    public function test_a_blog_category_can_be_updated(): void
    {
        $category = BlogCategory::create(['category_name' => 'Design']);

        $this->actingAs($this->adminUser())
            ->put(route('settings.blog_category.update'), [
                'blog_category_id' => $category->getKey(),
                'category_name' => 'Product Design',
                'category_description' => 'Updated description',
                'category_status' => 0,
            ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $category->refresh();

        $this->assertSame('Product Design', $category->category_name);
        $this->assertSame('Updated description', $category->category_description);
        $this->assertFalse($category->category_status);
    }

    public function test_a_blog_category_without_posts_can_be_deleted(): void
    {
        $category = BlogCategory::create(['category_name' => 'Design']);

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.delete', $category->getKey()))
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('blog_categories', ['id' => $category->getKey()]);
    }

    public function test_a_blog_category_with_posts_cannot_be_deleted(): void
    {
        $category = BlogCategory::create(['category_name' => 'Design']);
        $this->createPost($category);

        $this->actingAs($this->adminUser())
            ->get(route('settings.blog_category.delete', $category->getKey()))
            ->assertRedirect()
            ->assertSessionHas('error');

        $this->assertDatabaseHas('blog_categories', ['id' => $category->getKey()]);
    }

    public function test_the_blog_category_order_can_be_updated(): void
    {
        $category = BlogCategory::create(['category_name' => 'Design']);

        $this->actingAs($this->adminUser())
            ->post(route('settings.blog_category.sequence'), [
                'order' => [
                    ['id' => $category->getKey(), 'sequence' => 7],
                ],
            ])
            ->assertOk()
            ->assertJson(['status' => 'success']);

        $this->assertSame(7, (int) $category->refresh()->category_sequence);
    }

    /**
     * Insert a post that references the category.
     */
    private function createPost(BlogCategory $category): void
    {
        DB::table('blog_infos')->insert([
            'id' => (string) Str::uuid(),
            'blog_slug' => 'a-post',
            'blog_title' => 'A post',
            'category_id' => $category->getKey(),
            'blog_status' => true,
            'blog_sequence' => 0,
            'view_count' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
