<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ResearchInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table='research_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'research_source',
        'research_category',
        'research_title',
        'published_date',
        'research_role',
        'research_authors',
        'research_link',
        'research_details',
        'research_status',
        'research_sequence',
        'updated_by'
    ];

    protected $casts = [
        'published_date'        => 'date',
        'research_status'       => 'boolean',
        'research_sequence'     => 'integer',
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
            if (is_null($model->research_status)) {
                $model->research_status = true;
            }

            // Auto Sequence
            if (is_null($model->research_sequence)) {
                $model->research_sequence = static::max('research_sequence') + 1;
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
    | Attributes
    |--------------------------------------------------------------------------
    */
    public function getPublishedFormattedAttribute(): ?string
    {
        return $this->published_date?->format('d-M-Y');
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

    public function source()
    {
        return $this->belongsTo(SelectType::class, 'research_source');
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */
    public function scopeActive($query)
    {
        return $query->where('research_status', true);
    }

    public function scopeSorted($query)
    {
        return $query->orderBy('research_sequence', 'asc');
    }
}
