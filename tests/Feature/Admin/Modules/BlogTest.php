<?php

namespace Tests\Feature\Admin\Modules;

use App\Models\BlogCategory;
use App\Models\BlogInfo;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tests\Support\AdminModuleContract;
use Tests\Support\ColumnVisibilityContract;
use Tests\TestCase;

class BlogTest extends TestCase
{
    use AdminModuleContract;
    use ColumnVisibilityContract;

    protected function modulePrefix(): string
    {
        return 'module.blog';
    }

    protected function moduleIdField(): string
    {
        return 'blog_id';
    }

    protected function moduleModel(): string
    {
        return BlogInfo::class;
    }

    protected function moduleTitleField(): string
    {
        return 'blog_title';
    }

    protected function moduleSequenceColumn(): string
    {
        return 'blog_sequence';
    }

    protected function modulePayload(): array
    {
        return [
            'blog_title'   => 'First Post',
            'blog_excerpt' => 'An excerpt',
        ];
    }

    protected function moduleRequiredFields(): array
    {
        return ['blog_title'];
    }

    protected function moduleUpdatedTitle(): string
    {
        return 'First Post Revised';
    }

    protected function columnSettingsModule(): string
    {
        return 'blog';
    }

    protected function columnSettingsColumn(): string
    {
        return 'blog_title';
    }

    /**
     * The admin listing carries every post with its category label.
     */
    public function test_the_blog_page_lists_posts_with_their_category(): void
    {
        $category = $this->category('Engineering');

        $blog              = new BlogInfo();
        $blog->blog_title  = 'Listed post';
        $blog->category_id = $category->getKey();
        $blog->save();

        $this->actingAs($this->adminUser())
            ->get(route('module.blog.view'))
            ->assertOk()
            ->assertSee('Listed post')
            ->assertSee('Engineering')
            ->assertViewHas('blog_list', fn ($list) => $list->contains($blog))
            ->assertViewHas('blog_categories', fn ($list) => $list->contains($category));
    }

    /**
     * Tags, category and publish date are part of the stored post, and the
     * edit payload exposes the same column the form reads back.
     */
    public function test_a_post_stores_tags_category_and_publish_date(): void
    {
        $this->actingAs($this->adminUser());

        $category = $this->category();

        $this->post(route('module.blog.store'), [
            'blog_title'     => 'Clean Architecture',
            'blog_excerpt'   => 'A short summary',
            'blog_content'   => '<p>Body</p>',
            'keywords'       => 'laravel, php, architecture',
            'category_id'    => $category->getKey(),
            'blog_published' => '2026-04-08 10:30:00',
            'blog_status'    => 1,
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $blog = BlogInfo::query()->firstOrFail();

        $this->assertSame('clean-architecture', $blog->blog_slug);
        $this->assertSame('laravel, php, architecture', $blog->keywords);
        $this->assertSame($category->getKey(), $blog->category_id);
        $this->assertSame('2026-04-08 10:30:00', $blog->blog_published?->format('Y-m-d H:i:s'));
        $this->assertTrue($blog->blog_status);

        // The edit payload exposes the same attribute the form reads back
        // (the old scaffold sent `published_at`, which the model never has).
        $this->get(route('module.blog.edit', $blog->getKey()))
            ->assertOk()
            ->assertJsonPath('blog_published', fn ($value) => $value !== null
                && Carbon::parse($value)->equalTo($blog->blog_published))
            // The form value is pre-formatted in the application timezone, so
            // datetime-local does not shift the time when the modal is saved.
            ->assertJsonPath('blog_published_input', '2026-04-08T10:30')
            ->assertJsonMissingPath('published_at');

        // An emptied datetime input unpublishes the post instead of keeping
        // the previous value.
        $this->put(route('module.blog.update'), [
            'blog_id'        => $blog->getKey(),
            'blog_title'     => 'Clean Architecture',
            'blog_published' => '',
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $this->assertNull($blog->refresh()->blog_published);
    }

    /**
     * The publish datetime survives a round trip through the edit form.
     */
    public function test_the_publish_time_keeps_its_local_value_on_edit(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title'     => 'Scheduled',
            'blog_published' => '2026-04-08 10:30:00',
        ])->assertSessionHasNoErrors();

        $blog = BlogInfo::query()->firstOrFail();

        $this->put(route('module.blog.update'), [
            'blog_id'        => $blog->getKey(),
            'blog_title'     => 'Scheduled',
            // What the datetime-local input posts back unchanged.
            'blog_published' => '2026-04-08T10:30',
        ])->assertSessionHasNoErrors();

        $this->assertSame(
            '2026-04-08 10:30:00',
            $blog->refresh()->blog_published?->format('Y-m-d H:i:s')
        );
    }

    /**
     * A category id that is not in the lookup table is rejected.
     */
    public function test_a_post_rejects_an_unknown_category(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title'  => 'Unknown category',
            'category_id' => (string) Str::uuid(),
        ])->assertSessionHasErrors(['category_id']);
    }

    /**
     * Only real images are accepted for either image field.
     */
    public function test_a_post_rejects_a_non_image_upload(): void
    {
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title'          => 'Bad upload',
            'blog_image'          => UploadedFile::fake()->create('notes.pdf', 20, 'application/pdf'),
            'blog_featured_image' => UploadedFile::fake()->create('notes.pdf', 20, 'application/pdf'),
        ])->assertSessionHasErrors(['blog_image', 'blog_featured_image']);
    }

    /**
     * Both images are converted to WebP in their own directory, and an update
     * that uploads nothing keeps the stored files.
     */
    public function test_blog_images_are_stored_as_webp_and_survive_an_update_without_files(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title'          => 'With images',
            'blog_image'          => UploadedFile::fake()->image('cover.jpg', 900, 900),
            'blog_featured_image' => UploadedFile::fake()->image('featured.jpg', 1600, 800),
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $blog     = BlogInfo::query()->firstOrFail();
        $image    = (string) $blog->blog_image;
        $featured = (string) $blog->blog_featured_image;

        $this->assertStringStartsWith('uploads/blog/images/', $image);
        $this->assertStringEndsWith('.webp', $image);
        $this->assertStringStartsWith('uploads/blog/featured/', $featured);
        $this->assertStringEndsWith('.webp', $featured);
        Storage::disk('public')->assertExists($image);
        Storage::disk('public')->assertExists($featured);

        // The update form leaves both file inputs empty.
        $this->put(route('module.blog.update'), [
            'blog_id'    => $blog->getKey(),
            'blog_title' => 'With images, updated',
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $blog->refresh();

        $this->assertSame($image, $blog->blog_image);
        $this->assertSame($featured, $blog->blog_featured_image);
        Storage::disk('public')->assertExists($image);
        Storage::disk('public')->assertExists($featured);
    }

    /**
     * Uploading a new image deletes the file it replaces.
     */
    public function test_replacing_a_blog_image_deletes_the_previous_file(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title' => 'Replace me',
            'blog_image' => UploadedFile::fake()->image('first.jpg', 800, 600),
        ])->assertSessionHasNoErrors();

        $blog = BlogInfo::query()->firstOrFail();
        $old  = (string) $blog->blog_image;

        $this->put(route('module.blog.update'), [
            'blog_id'    => $blog->getKey(),
            'blog_title' => 'Replace me',
            'blog_image' => UploadedFile::fake()->image('second.jpg', 800, 600),
        ])
            ->assertSessionHasNoErrors()
            ->assertRedirect();

        $blog->refresh();

        $this->assertNotSame($old, $blog->blog_image);
        Storage::disk('public')->assertMissing($old);
        Storage::disk('public')->assertExists($blog->blog_image);
    }

    /**
     * Deleting a post removes its stored images too.
     */
    public function test_deleting_a_post_removes_its_images(): void
    {
        Storage::fake('public');
        $this->actingAs($this->adminUser());

        $this->post(route('module.blog.store'), [
            'blog_title'          => 'Delete me',
            'blog_image'          => UploadedFile::fake()->image('cover.jpg', 800, 600),
            'blog_featured_image' => UploadedFile::fake()->image('featured.jpg', 1600, 800),
        ])->assertSessionHasNoErrors();

        $blog     = BlogInfo::query()->firstOrFail();
        $image    = (string) $blog->blog_image;
        $featured = (string) $blog->blog_featured_image;

        $this->get(route('module.blog.delete', $blog->getKey()))->assertRedirect();

        $this->assertDatabaseMissing('blog_infos', ['id' => $blog->getKey()]);
        Storage::disk('public')->assertMissing($image);
        Storage::disk('public')->assertMissing($featured);
    }

    /*
    |--------------------------------------------------------------------------
    | Helpers
    |--------------------------------------------------------------------------
    */

    /**
     * A blog category to attach a post to.
     */
    private function category(string $name = 'Engineering'): BlogCategory
    {
        $category                  = new BlogCategory();
        $category->category_name   = $name;
        $category->category_status = true;
        $category->save();

        return $category;
    }
}
