<?php

namespace App\Services\ContactMessage;

use App\Models\ContactMessage;
use App\Traits\UserLogTrait;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ContactMessageService
{
    use UserLogTrait;

    /**
     * Data for the contact message admin view.
     *
     * @return array{message_list: Collection<int, ContactMessage>, unread_count: int}
     */
    public function viewData(): array
    {
        return [
            'message_list' => ContactMessage::sorted()->get(),
            'unread_count' => ContactMessage::unread()->count(),
        ];
    }

    /**
     * Mark a single message as read.
     *
     * @throws ModelNotFoundException
     */
    public function markRead(int $contact_message_id): ContactMessage
    {
        $message = ContactMessage::findOrFail($contact_message_id);

        $message->markAsRead();

        $this->logUserActivity('Contact Message', 'Message marked as read');

        return $message;
    }

    /**
     * Delete a single message.
     *
     * @throws ModelNotFoundException
     */
    public function delete(int $contact_message_id): void
    {
        $message = ContactMessage::findOrFail($contact_message_id);

        $message->delete();

        $this->logUserActivity('Contact Message', 'Message deleted');
    }
}
