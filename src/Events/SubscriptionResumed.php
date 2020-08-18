<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionResumed extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
