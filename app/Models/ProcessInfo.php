<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessInfo extends Model
{
    protected $table = 'processes';
    protected $fillable = ['service_id', 'title', 'details'];

    public function service()
    {
        return $this->belongsTo(ServiceInfo::class, 'service_id');
    }
}
