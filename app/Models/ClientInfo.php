<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientInfo extends Model
{
    use HasFactory;

    protected $table = 'client_infos';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'name',
        'email',
        'mobile',
        'picture',
        'designation',
        'organization',
        'address',
        'logo',
        'website',
        'status',
        'sequence',
        'updated_by',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'status'   => 'boolean', 
        'sequence' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Logic (Auto-Slug)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Generate slug from title
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->name);
            }

            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }

            // Auto Sequence
            if (is_null($model->sequence)) {
                $model->sequence = static::max('sequence') + 1;
            }
        });

        static::updating(function ($model) {
            // Generate slug from title
            if ($model->isDirty('name') && empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->name,$model->id);
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

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    /**
     * Get full image URL.
     * Usage: $member->image_url
     */

    protected function pictureUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->picture 
                ? asset('storage/' . $this->picture) 
                : asset('static/client-picture.png')
        );
    }

    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->logo 
                ? asset('storage/' . $this->logo) 
                : asset('static/client-logo.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: ClientInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Order by sequence.
     * Usage: ClientInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('sequence', 'asc');
    }

    /**
     * Custom function to generate unique slugs
     */
    public static function generateUniqueSlug($title, $ignoreId = null)
    {
        $originalSlug = Str::slug($title);
        $slug = $originalSlug;
        $count = 1;
        while (static::where('slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
