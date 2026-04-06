<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SkillInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'skill_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'skill_title',
        'skill_logo',
        'skill_score',
        'skill_details',
        'skill_status',
        'skill_sequence',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'skill_status'              => 'boolean',
        'skill_sequence'            => 'integer',
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
            if (is_null($model->skill_status)) {
                $model->skill_status = true;
            }

            // Auto Sequence
            if (is_null($model->skill_sequence)) {
                $model->skill_sequence = static::max('skill_sequence') + 1;
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

    public function updatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    protected function skillLogoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->skill_logo
                ? asset('storage/' . $this->skill_logo)
                : asset('static/logo/skill.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: SkillInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('skill_status', true);
    }

    /**
     * Order by sequence.
     * Usage: SkillInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('skill_sequence', 'asc');
    }
}
