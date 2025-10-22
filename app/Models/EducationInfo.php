<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EducationInfo extends Model
{
    protected $casts = [
        'start_date' => 'date',
        'end_date'   => 'date',
    ];
}
