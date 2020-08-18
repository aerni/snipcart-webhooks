<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionCreated extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
