<?php

namespace Aerni\SnipcartWebhooks\Tests;

use Aerni\SnipcartWebhooks\SnipcartWebhooksServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function getPackageProviders($app)
    {
        return [
            SnipcartWebhooksServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('snipcart-webhooks.live_secret', 'this-is-a-secret-live-key');
        $app['config']->set('snipcart-webhooks.test_secret', 'this-is-a-secret-test-key');
    }
}
