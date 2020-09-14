<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionResumed extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
