<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = [
        'name',
        'title',
        'description',
        'status',
    ];

    public static function get_id_by_name(string $name): ?int
    {
        return self::where('name', $name)->value('id');
    }
}
