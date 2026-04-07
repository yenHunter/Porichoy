<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ServiceInfo extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'service_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'slug',
        'service_title',
        'service_subtitle',
        'service_icon',
        'profile_image',
        'cover_image',
        'service_details',
        'service_skills',
        'service_status',
        'service_sequence'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'service_status'   => 'boolean', // 1=true, 0=false
        'service_sequence' => 'integer',
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
                $model->slug = static::generateUniqueSlug($model->service_title);
            }

            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }

            // Auto Sequence
            if (is_null($model->service_sequence)) {
                $model->service_sequence = static::max('service_sequence') + 1;
            }
        });

        static::updating(function ($model) {
            // Generate slug from title
            if ($model->isDirty('service_title') && empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->service_title, $model->id);
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

    protected function serviceIconUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->service_icon
                ? asset('storage/' . $this->service_icon)
                : asset('static/logo/service.png')
        );
    }

    protected function serviceProfileUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->profile_image
                ? asset('storage/' . $this->profile_image)
                : asset('static/logo/service.png')
        );
    }

    protected function serviceCoverUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->cover_image
                ? asset('storage/' . $this->cover_image)
                : asset('static/logo/service.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: ServiceInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('service_status', true);
    }

    /**
     * Order by sequence.
     * Usage: ServiceInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('service_sequence', 'asc');
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
