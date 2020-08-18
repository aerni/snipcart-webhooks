<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionCancelled extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
