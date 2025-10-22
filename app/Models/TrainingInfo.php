<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class TrainingInfo extends Model
{
    protected $fillable = [
        'title',
        'category_id',
        'institute',
        'start_date',
        'end_date',
        'location',
        'certificate'
    ];

    protected static function booted()
    {
        static::saving(function ($model) {
            if (Auth::check()) {
                $model->updated_by = Auth::id();
            }
        });
    }

    public function category()
    {
        return $this->belongsTo(SelectType::class, 'category_id');
    }
}
