<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectType extends Model
{
    /**
     * The `use_for` value marking a row as a training category.
     */
    public const TRAINING_CATEGORY = 'training_category';

    /**
     * The `use_for` value marking a row as a blog category.
     */
    public const BLOG_CATEGORY = 'blog_category';

    /**
     * The `use_for` value marking a row as an employment type.
     */
    public const EMPLOYMENT_TYPE = 'employment_type';

    /**
     * The `use_for` value marking a row as a location type.
     */
    public const LOCATION_TYPE = 'location_type';

    /**
     * The `use_for` value marking a row as a research source.
     */
    public const RESEARCH_SOURCE = 'research_source';

    protected $fillable = [
        'use_for',
        'value',
        'details',
        'status',
        'sequence',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Logic (Auto-handling)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Auto Sequence - append to the end of this list
            if (is_null($model->sequence)) {
                $model->sequence = static::where('use_for', $model->use_for)->max('sequence') + 1;
            }
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active rows.
     * Usage: SelectType::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('status', true);
    }

    /**
     * Order by the drag/drop sequence, falling back to the id so rows that
     * share a sequence (every seeded row) still have a stable order.
     * Usage: SelectType::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('sequence')->orderBy('id');
    }

    public function research()
    {
        return $this->hasMany(ResearchInfo::class, 'source_id');
    }

    public function training()
    {
        return $this->hasMany(TrainingInfo::class, 'category_id');
    }

    public function blogs()
    {
        return $this->hasMany(BlogInfo::class, 'category_id');
    }
}
