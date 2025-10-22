<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $fillable = [
        'module_id',
        'action',
        'user_id',
        'user_ip',
    ];

    public function module()
    {
        $this->belongsTo(Module::class, 'module_id');
    }

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
