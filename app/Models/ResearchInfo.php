<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ResearchInfo extends Model
{
    protected $fillable = [
        'source_id',
        'category',
        'title',
        'published',
        'role',
        'authors',
        'link',
        'status',
        'sequence',
        'updated_by'
    ];

    protected $casts = [
        'published' => 'date', // will auto-cast to Carbon\Carbon
    ];

    // Optional accessor for formatted date
    public function getPublishedFormattedAttribute(): ?string
    {
        return $this->published?->format('d-M-Y');
    }

    protected static function booted()
    {
        static::saving(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    public function source()
    {
        return $this->belongsTo(SelectType::class, 'source_id');
    }
}
