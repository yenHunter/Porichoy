<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    /**
     * RefreshDatabase (or explicit migrate) is required in feature tests that
     * hit routes wrapped by package middleware with their own tables
     * (e.g. the website-analytics tracker). phpunit.xml runs against an
     * in-memory SQLite database that starts with no tables.
     */
}
