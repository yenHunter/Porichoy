<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClientInfo extends Model
{
    use HasFactory, HasUuids;

    protected $table = 'client_infos';
    protected $keyType = 'string';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'client_name',
        'client_email',
        'client_mobile',
        'client_picture',
        'client_designation',
        'client_organization',
        'client_address',
        'organization_logo',
        'organization_website',
        'client_status',
        'client_sequence',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'client_status'     => 'boolean',
        'client_sequence'   => 'integer',
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
            if (is_null($model->client_status)) {
                $model->client_status = true;
            }

            // Auto Sequence
            if (is_null($model->client_sequence)) {
                $model->client_sequence = static::max('client_sequence') + 1;
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

    protected function clientPictureUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->client_picture
                ? asset('storage/' . $this->client_picture)
                : asset('static/icons/client.png')
        );
    }

    protected function ClientOrgLogoUrl(): Attribute
    {
        return Attribute::make(
            get: fn() => $this->organization_logo
                ? asset('storage/' . $this->organization_logo)
                : asset('static/icons/organization.png')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active ones.
     * Usage: ClientInfo::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('client_status', true);
    }

    /**
     * Order by sequence.
     * Usage: ClientInfo::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderBy('client_sequence', 'asc');
    }
}
