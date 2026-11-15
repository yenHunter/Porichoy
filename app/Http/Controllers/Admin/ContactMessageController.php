<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\ContactMessage\ContactMessageService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ContactMessageController extends Controller
{
    public function __construct(
        private readonly ContactMessageService $contact_message_service
    ) {}

    /**
     * Display the contact message inbox.
     */
    public function view(): View
    {
        return view(
            'admin.pages.management.contact-message',
            $this->contact_message_service->viewData()
        );
    }

    /**
     * Mark a single message as read.
     */
    public function read(int $contact_message_id): RedirectResponse
    {
        $this->contact_message_service->markRead($contact_message_id);

        return back()->with('success', 'Message marked as read.');
    }

    /**
     * Delete a single message.
     */
    public function delete(int $contact_message_id): RedirectResponse
    {
        $this->contact_message_service->delete($contact_message_id);

        return back()->with('success', 'Message deleted.');
    }
}
