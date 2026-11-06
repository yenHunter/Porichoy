<?php

namespace Tests\Unit;

use App\Rules\ReCaptcha;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;
use Tests\TestCase;

class ReCaptchaRuleTest extends TestCase
{
    private function validate(?string $token): bool
    {
        return Validator::make(
            ['g-recaptcha-response' => $token],
            ['g-recaptcha-response' => [new ReCaptcha]]
        )->passes();
    }

    /**
     * The validator skips non-implicit rules for absent attributes, so the
     * rule itself is exercised directly here.
     */
    public function test_an_empty_token_fails(): void
    {
        $failures = [];

        (new ReCaptcha)->validate('g-recaptcha-response', '', function (string $message) use (&$failures) {
            $failures[] = $message;
        });

        $this->assertNotEmpty($failures, 'an empty token must fail the rule');
    }

    public function test_an_unconfigured_secret_fails_closed(): void
    {
        config(['services.recaptcha.secret_key' => null]);

        $this->assertFalse($this->validate('a-token'));
    }

    public function test_google_approval_passes(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => true], 200),
        ]);

        $this->assertTrue($this->validate('a-token'));
    }

    public function test_google_rejection_fails(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response(['success' => false], 200),
        ]);

        $this->assertFalse($this->validate('a-token'));
    }

    public function test_an_unreadable_google_response_fails_closed(): void
    {
        Http::fake([
            'www.google.com/recaptcha/*' => Http::response('<html>gateway error</html>', 502),
        ]);

        $this->assertFalse($this->validate('a-token'));
    }
}
