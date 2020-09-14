<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionCancelled extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
