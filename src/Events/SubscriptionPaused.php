<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionPaused extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
