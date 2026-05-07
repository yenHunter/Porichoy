<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'blog_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'blog_slug',
        'blog_title',
        'blog_excerpt',
        'blog_content',
        'blog_image',
        'blog_featured_image',
        'keywords',
        'category_id',
        'blog_status',
        'blog_sequence',
        'view_count',
        'blog_published',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'blog_status'           => 'boolean',
        'blog_sequence'         => 'integer',
        'view_count'            => 'integer',
        'keywords'              => 'string',
        'blog_published'        => 'datetime',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Logic (Auto-handling)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Generate slug from title
            if (empty($model->blog_slug)) {
                $model->blog_slug = static::generateUniqueSlug($model->blog_title);
            }

            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }

            // Auto Status
            if (is_null($model->blog_status)) {
                $model->blog_status = true;
            }

            // Auto Sequence
            if (is_null($model->blog_sequence)) {
                $model->blog_sequence = static::max('blog_sequence') + 1;
            }

            // Initialize view count
            if (is_null($model->view_count)) {
                $model->view_count = 0;
            }
        });

        static::updating(function ($model) {
            // Generate slug from title
            if (empty($model->blog_slug)) {
                $model->blog_slug = static::generateUniqueSlug($model->blog_title);
            }

            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function category(): BelongsTo
    {
        return $this->belongsTo(BlogCategory::class, 'category_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    protected function blogImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->blog_image
                ? asset('storage/' . $this->blog_image)
                : asset('static/icons/blog.png')
        );
    }

    protected function blogFeaturedImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->blog_featured_image
                ? asset('storage/' . $this->blog_featured_image)
                : asset('static/icons/featured.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active blogs.
     * Usage: BlogInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('blog_status', true);
    }

    /**
     * Get only published blogs (blog_published is not null and is in the past).
     * Usage: BlogInfo::published()->get();
     */
    public function scopePublished($query)
    {
        return $query->where('blog_status', true)
                     ->whereNotNull('blog_published')
                     ->where('blog_published', '<=', now());
    }

    /**
     * Order by sequence.
     * Usage: BlogInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('blog_sequence', 'asc');
    }

    /**
     * Order by published date (newest first).
     * Usage: BlogInfo::latestPublished()->get();
     */
    public function scopeLatestPublished($query)
    {
        return $query->orderBy('blog_published', 'desc');
    }

    /**
     * Order by view count (most viewed first).
     * Usage: BlogInfo::mostViewed()->get();
     */
    public function scopeMostViewed($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    /**
     * Custom function to generate unique slugs
     */
    public static function generateUniqueSlug($title, $ignoreId = null)
    {
        $originalSlug = Str::slug($title);
        $slug = $originalSlug;
        $count = 1;
        while (static::where('blog_slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
