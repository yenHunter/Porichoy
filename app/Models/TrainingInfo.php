<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TrainingInfo extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'training_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'training_title',
        'training_category',
        'training_institute',
        'start_date',
        'end_date',
        'training_location',
        'training_certificate',
        'training_details',
        'training_status',
        'training_sequence'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'start_date'            => 'date',
        'end_date'              => 'date',
        'training_status'       => 'boolean',
        'training_sequence'     => 'integer',
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
            if (is_null($model->training_status)) {
                $model->training_status = true;
            }

            // Auto Sequence
            if (is_null($model->training_sequence)) {
                $model->training_sequence = static::max('training_sequence') + 1;
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

    public function category(): BelongsTo
    {
        return $this->belongsTo(SelectType::class, 'training_category');
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */
    protected function certificateUrl(): Attribute
    {
        return Attribute::get(function () {
            // If the column is empty, return a placeholder or null
            if (!$this->training_certificate) {
                return null;
            }

            // If it's already a full web link, return it as is
            if (Str::startsWith($this->training_certificate, ['http://', 'https://'])) {
                return $this->training_certificate;
            }

            // Otherwise, generate a URL from your local storage disk
            return Storage::url($this->training_certificate);
        });
    }

    protected function dateRange(): Attribute
    {
        return Attribute::get(function () {
            // Ensure start_date exists to avoid errors
            if (!$this->start_date) {
                return null;
            }

            $start = $this->start_date->format('d M Y');

            // Check if end_date is null or in the future
            $end = $this->end_date
                ? $this->end_date->format('d M Y')
                : 'Present';

            return "{$start} — {$end}";
        });
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: TrainingInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('training_status', true);
    }

    /**
     * Order by sequence.
     * Usage: TrainingInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('training_sequence', 'asc');
    }
}
