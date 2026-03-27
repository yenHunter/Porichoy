<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class EducationInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'education_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'education_degree',
        'education_subject',
        'education_institute',
        'institute_logo',
        'institute_address',
        'start_date',
        'end_date',
        'education_result',
        'education_details',
        'education_status',
        'education_sequence',
        'updated_by',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'education_status'              => 'boolean',
        'education_sequence'            => 'integer',
        'start_date'                    => 'date',
        'end_date'                      => 'date',
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
            if (is_null($model->education_status)) {
                $model->education_status = true;
            }

            // Auto Sequence
            if (is_null($model->education_sequence)) {
                $model->education_sequence = static::max('education_sequence') + 1;
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

    protected function logoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->institute_logo
                ? asset('storage/' . $this->institute_logo)
                : asset('static/logo/education.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: EducationInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('education_status', true);
    }

    /**
     * Order by sequence.
     * Usage: EducationInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('education_sequence', 'asc');
    }
}
