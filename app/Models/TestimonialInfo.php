<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TestimonialInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'testimonial_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'client_id',
        'testimonial_title',
        'testimonial_details',
        'testimonial_review',
        'testimonial_status',
        'testimonial_sequence',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'testimonial_status'    => 'boolean',
        'testimonial_review'    => 'integer',
        'testimonial_sequence'  => 'integer',
        'created_at'            => 'datetime',
        'updated_at'            => 'datetime',
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
            if (is_null($model->testimonial_status)) {
                $model->testimonial_status = true;
            }

            // Auto Sequence
            if (is_null($model->testimonial_sequence)) {
                $model->testimonial_sequence = static::max('testimonial_sequence') + 1;
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

    /**
     * Get the client that owns the testimonial.
     */
    public function client(): BelongsTo
    {
        return $this->belongsTo(ClientInfo::class, 'client_id');
    }

    /**
     * Get the user who updated this testimonial.
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

    /**
     * Get review rating as percentage (1-5 stars to 20-100%).
     */
    protected function reviewPercentage(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->review * 20
        );
    }

    /**
     * Get star rating display (1-5).
     */
    protected function starRating(): Attribute
    {
        return Attribute::make(
            get: fn() => max(1, min(5, $this->review ?? 5))
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active testimonials.
     * Usage: TestimonialInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('testimonial_status', true);
    }

    /**
     * Order by sequence.
     * Usage: TestimonialInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('testimonial_sequence', 'asc');
    }

    /**
     * Filter testimonials by client.
     * Usage: TestimonialInfo::forClient($clientId)->get();
     */
    public function scopeForClient($query, $clientId)
    {
        return $query->where('client_id', $clientId);
    }

    /**
     * Filter by minimum review rating.
     * Usage: TestimonialInfo::minReview(4)->get();
     */
    public function scopeMinReview($query, $minRating)
    {
        return $query->where('testimonial_review', '>=', $minRating);
    }

    /**
     * Filter by exact review rating.
     * Usage: TestimonialInfo::withReview(5)->get();
     */
    public function scopeWithReview($query, $rating)
    {
        return $query->where('testimonial_review', $rating);
    }
}
