<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SelectType extends Model
{
    protected $fillable = [
        'use_for',
        'value',
        'details',
        'status'
    ];

    public function research()
    {
        return $this->hasMany(ResearchInfo::class, 'source_id');
    }

    public function training()
    {
        return $this->hasMany(TrainingInfo::class, 'category_id');
    }
}
