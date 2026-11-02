<?php

namespace Tests;

use App\Models\User;
use Illuminate\Support\Facades\Http;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * Keep the suite hermetic: no test may reach the network by accident.
     * Every outbound call has to be faked with Http::fake(), otherwise the
     * test fails here instead of quietly passing on a developer machine and
     * breaking on CI.
     */
    protected function setUp(): void
    {
        parent::setUp();

        Http::preventStrayRequests();
    }

    /**
     * RefreshDatabase (or explicit migrate) is required in feature tests that
     * hit routes wrapped by package middleware with their own tables
     * (e.g. the website-analytics tracker). phpunit.xml runs against an
     * in-memory SQLite database that starts with no tables.
     */

    /**
     * Create an active user, ready to be passed to actingAs().
     *
     * @param  array<string, mixed> $attributes
     * @return User
     */
    protected function adminUser(array $attributes = []): User
    {
        return User::factory()->create($attributes);
    }
}
