<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThemeInfo extends Model
{
    use HasFactory;

    protected $table = 'theme_infos';

    protected $fillable = [
        'slug',
        'title',
        'description',
        'version',
        'asset_path',
        'preview_image',
        'sequence',
        'status',
        'updated_by',
    ];

    protected $casts = [
        'status'        => 'boolean', 
        'sequence'      => 'integer',
    ];

    protected static function booted()
    {
        static::creating(function ($model) {
            // Generate slug from title
            if (empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->title);
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
            if ($model->isDirty('title') && empty($model->slug)) {
                $model->slug = static::generateUniqueSlug($model->title,$model->id);
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

    public function sections(): HasMany
    {
        return $this->hasMany(SectionInfo::class, 'theme_id');
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

    protected function imageUrl(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->preview_image 
                ? asset('storage/' . $this->preview_image) 
                : asset('static/theme-preview.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    public function scopeSorted($query)
    {
        return $query->orderBy('sequence', 'asc');
    }

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
