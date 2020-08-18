<?php

namespace Aerni\SnipcartWebhooks\Events;

class SubscriptionInvoiceCreated extends Event
{
    public $subscription;

    public function __construct($subscription)
    {
        $this->subscription = $subscription;
    }
}
