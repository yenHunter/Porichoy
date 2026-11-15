<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Notifications\WelcomeSetPasswordNotification;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'profile_picture',
        'user_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_status' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Boot Logic (Auto-handling)
    |--------------------------------------------------------------------------
    */
    protected static function booted()
    {
        static::creating(function ($model) {
            // Auto Status - set to true if null
            if (is_null($model->user_status)) {
                $model->user_status = true;
            }
        });
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function sendWelcomeNotification($token)
    {
        $this->notify(new WelcomeSetPasswordNotification($token));
    }

    /*
    |--------------------------------------------------------------------------
    | Attributes
    |--------------------------------------------------------------------------
    */

    protected function profilePictureUrl(): Attribute
    {
        return Attribute::make(
            get: function () {
                // Bundled and seeded images live under `static/`, uploads live on
                // the public storage disk. A user with neither gets the default
                // icon rather than a `storage/` URL that resolves to a 403.
                if (blank($this->profile_picture)) {
                    return asset('static/icons/user.png');
                }

                return Str::contains($this->profile_picture, 'static/')
                    ? asset($this->profile_picture)
                    : asset('storage/'.$this->profile_picture);
            }
        );
    }

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only active users.
     * Usage: User::active()->get();
     */
    public function scopeActive($query)
    {
        return $query->where('user_status', true);
    }
}
