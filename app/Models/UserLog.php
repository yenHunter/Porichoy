<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    protected $table = 'user_logs';
    protected $fillable = [
        'module',
        'action',
        'user_id',
        'user_ip',
        'user_agent'
    ];

    public function user()
    {
        $this->belongsTo(User::class, 'user_id');
    }
}
