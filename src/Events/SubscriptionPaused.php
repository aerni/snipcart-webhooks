<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionPaused extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
