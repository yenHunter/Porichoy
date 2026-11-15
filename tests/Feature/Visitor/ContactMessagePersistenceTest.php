<?php

namespace Tests\Feature\Visitor;

use App\Models\ContactMessage;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ContactMessagePersistenceTest extends TestCase
{
    use RefreshDatabase;

    public function test_a_valid_submission_is_persisted_with_request_metadata(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => true], 200),
        ]);

        $this->post('/contact', [
            'name' => 'Test Visitor',
            'email' => 'visitor@example.com',
            'phone' => '555-0100',
            'comments' => 'I would like to discuss a new project.',
            'g-recaptcha-response' => 'test-token',
        ])
            ->assertRedirect()
            ->assertSessionHas('success')
            ->assertSessionDoesntHaveErrors();

        $message = ContactMessage::firstOrFail();

        $this->assertSame('Test Visitor', $message->name);
        $this->assertSame('visitor@example.com', $message->email);
        $this->assertSame('555-0100', $message->phone);
        $this->assertSame('I would like to discuss a new project.', $message->message);
        $this->assertFalse($message->is_read);
        $this->assertNotNull($message->ip);
    }

    public function test_an_invalid_submission_is_not_persisted(): void
    {
        $this->post('/contact', [])
            ->assertRedirect()
            ->assertSessionHasErrors(['name', 'email', 'comments', 'g-recaptcha-response']);

        $this->assertDatabaseCount('contact_messages', 0);
    }
}
