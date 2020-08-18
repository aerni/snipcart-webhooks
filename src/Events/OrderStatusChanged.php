<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderStatusChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
