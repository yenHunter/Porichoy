<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProjectInfo extends Model
{
    use HasFactory, HasUuids;
    protected $table = 'project_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'project_slug',
        'project_title',
        'project_details',
        'profile_image',
        'cover_image',
        'client_id',
        'start_date',
        'end_date',
        'service_id',
        'project_location',
        'project_background',
        'project_challenges',
        'project_solution',
        'project_status',
        'project_sequence'
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'project_status'   => 'boolean', // 1=true, 0=false
        'project_sequence' => 'integer',
        'start_date'       => 'date',
        'end_date'         => 'date',
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
            if (empty($model->project_slug)) {
                $model->project_slug = static::generateUniqueSlug($model->project_title);
            }

            // Auto User ID
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }

            // Auto Sequence
            if (is_null($model->project_sequence)) {
                $model->project_sequence = static::max('project_sequence') + 1;
            }

            // Auto Status
            if (is_null($model->project_status)) {
                $model->project_status = true;
            }
        });

        static::updating(function ($model) {
            // Generate slug from title
            if ($model->isDirty('project_title') && empty($model->project_slug)) {
                $model->project_slug = static::generateUniqueSlug($model->project_title, $model->id);
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

    public function client(): BelongsTo
    {
        return $this->belongsTo(ClientInfo::class, 'client_id');
    }

    public function service(): BelongsTo
    {
        return $this->belongsTo(ServiceInfo::class, 'service_id');
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

    protected function projectProfileImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->profile_image
                ? asset('storage/' . $this->profile_image)
                : asset('static/logo/project.png')
        );
    }

    protected function projectCoverImageUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->cover_image
                ? asset('storage/' . $this->cover_image)
                : asset('static/logo/project.png')
        );
    }

    protected function projectDateRange(): Attribute
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
     * Usage: ProjectInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('project_status', true);
    }

    /**
     * Order by sequence.
     * Usage: ProjectInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('project_sequence', 'asc');
    }

    /**
     * Custom function to generate unique slugs
     */
    public static function generateUniqueSlug($title, $ignoreId = null)
    {
        $originalSlug = Str::slug($title);
        $slug = $originalSlug;
        $count = 1;
        while (static::where('project_slug', $slug)->where('id', '!=', $ignoreId)->exists()) {
            $slug = $originalSlug . '-' . $count;
            $count++;
        }

        return $slug;
    }
}
