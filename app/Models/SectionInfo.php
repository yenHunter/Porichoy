<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SectionInfo extends Model
{
    protected $table = 'section_infos';

    protected $fillable = [
        'theme_id',
        'title',
        'content',
        'sequence',
        'status',
        'updated_by',
    ];
}
