<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;

class OrderTrackingNumberChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
