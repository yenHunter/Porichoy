<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogCategory extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'blog_categories';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'category_name',
        'category_description',
        'category_status',
        'category_sequence',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'category_status'   => 'boolean',
        'category_sequence' => 'integer',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Logic (Auto-handling)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }

            // Auto Status
            if (is_null($model->category_status)) {
                $model->category_status = true;
            }

            // Auto Sequence
            if (is_null($model->category_sequence)) {
                $model->category_sequence = static::max('category_sequence') + 1;
            }
        });

        static::updating(function ($model) {
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

    public function blogs(): HasMany
    {
        return $this->hasMany(BlogInfo::class, 'category_id');
    }

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active categories.
     * Usage: BlogCategory::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('category_status', true);
    }

    /**
     * Order by sequence.
     * Usage: BlogCategory::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('category_sequence', 'asc');
    }
}
