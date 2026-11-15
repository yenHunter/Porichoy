<?php

namespace Tests\Feature\Admin\Management;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactMessageTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Create a stored contact message.
     *
     * @param  array<string, mixed>  $attributes
     */
    private function message(array $attributes = []): ContactMessage
    {
        return ContactMessage::create(array_merge([
            'name' => 'Test Visitor',
            'email' => 'visitor@example.com',
            'phone' => '555-0100',
            'message' => 'I would like to discuss a new project.',
            'ip' => '127.0.0.1',
            'user_agent' => 'phpunit',
        ], $attributes));
    }

    public function test_the_inbox_lists_messages_and_the_unread_count(): void
    {
        $admin = $this->adminUser();
        $this->message();
        $this->message(['is_read' => true]);

        $this->actingAs($admin)
            ->get(route('management.contact_message.view'))
            ->assertOk()
            ->assertViewHas('unread_count', 1)
            ->assertViewHas('message_list', fn ($messages) => $messages->count() === 2);
    }

    public function test_a_message_can_be_marked_as_read(): void
    {
        $admin = $this->adminUser();
        $message = $this->message();

        $this->actingAs($admin)
            ->get(route('management.contact_message.read', $message->id))
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertTrue($message->fresh()->is_read);
        $this->assertDatabaseHas('user_logs', [
            'module' => 'Contact Message',
            'action' => 'Message marked as read',
        ]);
    }

    public function test_a_message_can_be_deleted(): void
    {
        $admin = $this->adminUser();
        $message = $this->message();

        $this->actingAs($admin)
            ->get(route('management.contact_message.delete', $message->id))
            ->assertRedirect()
            ->assertSessionHas('success');

        $this->assertDatabaseMissing('contact_messages', ['id' => $message->id]);
        $this->assertDatabaseHas('user_logs', [
            'module' => 'Contact Message',
            'action' => 'Message deleted',
        ]);
    }

    public function test_an_unknown_message_is_a_404(): void
    {
        $this->actingAs($this->adminUser())
            ->get(route('management.contact_message.read', 999999))
            ->assertNotFound();
    }

    public function test_guests_cannot_open_the_inbox(): void
    {
        $this->get(route('management.contact_message.view'))
            ->assertRedirect(route('login'));
    }
}
