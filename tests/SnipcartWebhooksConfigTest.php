<?php

namespace Aerni\SnipcartWebhooks\Tests;

use Aerni\SnipcartWebhooks\SnipcartWebhooksConfigRepository as ConfigRepository;
use Aerni\SnipcartWebhooks\Tests\TestCase;

class SnipcartWebhooksConfigTest extends TestCase
{
    /** @test */
    public function it_can_get_the_test_secret()
    {
        $testSecret = (new ConfigRepository())->apiSecret();

        $this->assertEquals($testSecret, config('snipcart-webhooks.test_secret'));
    }

    /** @test */
    public function it_can_get_the_live_secret()
    {
        config()->set('snipcart-webhooks.test_mode', false);

        $liveSecret = (new ConfigRepository())->apiSecret();

        $this->assertEquals($liveSecret, config('snipcart-webhooks.live_secret'));
    }
}
