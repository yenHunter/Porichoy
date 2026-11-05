<?php

namespace Tests\Feature\Visitor;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A valid submission is logged and flashed back.
     */
    public function test_contact_form_logs_a_valid_message(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => true], 200),
        ]);

        Log::shouldReceive('channel')->once()->with('contact')->andReturnSelf();
        Log::shouldReceive('info')->once()->withArgs(function (string $message, array $context) {
            return $message === 'New contact message received'
                && $context['name'] === 'Test Visitor'
                && $context['email'] === 'visitor@example.com'
                && $context['phone'] === '555-0100'
                && $context['message'] === 'I would like to discuss a new project.';
        });

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
    }

    /**
     * Validation failures come back as field errors, not as one generic error.
     */
    public function test_contact_form_returns_field_errors(): void
    {
        $this->post('/contact', [])
            ->assertRedirect()
            ->assertSessionHasErrors(['name', 'email', 'comments', 'g-recaptcha-response'])
            ->assertSessionDoesntHaveErrors(['error']);
    }

    /**
     * An invalid reCAPTCHA token is rejected.
     */
    public function test_contact_form_rejects_an_invalid_captcha(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => false], 200),
        ]);

        $this->post('/contact', [
            'name' => 'Test Visitor',
            'email' => 'visitor@example.com',
            'comments' => 'I would like to discuss a new project.',
            'g-recaptcha-response' => 'bad-token',
        ])
            ->assertRedirect()
            ->assertSessionHasErrors(['g-recaptcha-response']);
    }
}
