<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionCreated extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
