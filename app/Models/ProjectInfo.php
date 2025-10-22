<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ProjectInfo extends Model
{
    protected $table = 'project_infos';
    protected $fillable = ['title', 'start_date', 'details'];

    // Use slug for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Boot method to auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($project) {
            $project->slug = Str::slug($project->title);
        });

        static::updating(function ($project) {
            $project->slug = Str::slug($project->title);
        });

        static::saving(function ($project) {
            if (Auth::check()) {
                $project->updated_by = Auth::id();
            }
        });
    }

    public function service()
    {
        return $this->belongsTo(ServiceInfo::class, 'service_id');
    }

    public function client()
    {
        return $this->belongsTo(ClientInfo::class, 'client_id');
    }
}
