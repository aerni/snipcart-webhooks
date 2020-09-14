<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderRefundCreated extends Event
{
    public $payload;

    public function __construct($payload)
    {
        $this->payload = $payload;
    }
}
