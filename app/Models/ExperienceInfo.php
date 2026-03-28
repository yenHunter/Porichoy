<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ExperienceInfo extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'experience_infos';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'employment_position',
        'employment_type',
        'employment_department',
        'employment_organization',
        'organization_logo',
        'organization_address',
        'start_date',
        'end_date',
        'location_type',
        'employment_details',
        'employment_status',
        'employment_sequence',
        'updated_by'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_date'            => 'date',
        'end_date'              => 'date',
        'employment_status'     => 'boolean',
        'employment_sequence'   => 'integer',
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
            if (is_null($model->employment_status)) {
                $model->employment_status = true;
            }

            // Auto Sequence
            if (is_null($model->employment_sequence)) {
                $model->employment_sequence = static::max('employment_sequence') + 1;
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

    protected function organizationLogoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->organization_logo
                ? asset('storage/' . $this->organization_logo)
                : asset('static/logo/experience.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: ExperienceInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('employment_status', true);
    }

    /**
     * Order by sequence.
     * Usage: ExperienceInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('employment_sequence', 'asc');
    }
}
