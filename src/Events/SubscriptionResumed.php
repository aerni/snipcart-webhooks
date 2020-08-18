<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;

class SubscriptionResumed extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
