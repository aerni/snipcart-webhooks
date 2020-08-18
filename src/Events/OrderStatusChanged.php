<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;

class OrderStatusChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
