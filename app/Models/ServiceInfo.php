<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class ServiceInfo extends Model
{
    protected $table = 'service_infos';
    protected $fillable = ['title', 'sub_title', 'projects', 'details'];

    public function processes()
    {
        return $this->hasMany(ProcessInfo::class, 'service_id');
    }

    // Use slug for route model binding
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // Boot method to auto-generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($service) {
            $service->slug = Str::slug($service->title);
        });

        static::updating(function ($service) {
            $service->slug = Str::slug($service->title);
        });

        static::saving(function ($service) {
            if (Auth::check()) {
                $service->updated_by = Auth::id();
            }
        });
    }
}
