<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderTrackingNumberChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
