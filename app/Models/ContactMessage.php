<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'message',
        'ip',
        'user_agent',
        'is_read',
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Behaviour
    |--------------------------------------------------------------------------
    */

    /**
     * Flag the message as read (no-op when it already is).
     */
    public function markAsRead(): void
    {
        if ($this->is_read) {
            return;
        }

        $this->forceFill(['is_read' => true])->save();
    }

    /*
    |--------------------------------------------------------------------------
    | Scopes
    |--------------------------------------------------------------------------
    */

    /**
     * Get only messages that have not been opened yet.
     * Usage: ContactMessage::unread()->count();
     */
    public function scopeUnread($query)
    {
        return $query->where('is_read', false);
    }

    /**
     * Order by newest first.
     * Usage: ContactMessage::sorted()->get();
     */
    public function scopeSorted($query)
    {
        return $query->orderByDesc('created_at');
    }
}
