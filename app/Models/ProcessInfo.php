<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProcessInfo extends Model
{
    // The migration defines process_infos; the model's old table name pointed at a table that never existed.
    protected $table = 'process_infos';
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(ServiceInfo::class, 'service_id');
    }
}
