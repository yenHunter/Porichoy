<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogComment extends Model
{
    use HasFactory;

    protected $table = 'blog_comments';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'blog_id',
        'user_id',
        'commenter_name',
        'commenter_image',
        'commenter_email',
        'comment_text',
        'comment_status',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'comment_status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    protected function commenterImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->commenter_image
                ? asset('storage/' . $this->commenter_image)
                : asset('static/icons/commenter.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Relationships
    |--------------------------------------------------------------------------
    */

    public function blog(): BelongsTo
    {
        return $this->belongsTo(BlogInfo::class, 'blog_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only approved comments.
     * Usage: BlogComment::approved()->get();
     */
    public function scopeApproved($query)
    {
        return $query->where('comment_status', true);
    }

    /**
     * Order by newest first.
     * Usage: BlogComment::latest()->get();
     */
    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    /**
     * Order by oldest first.
     * Usage: BlogComment::oldest()->get();
     */
    public function scopeOldest($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
