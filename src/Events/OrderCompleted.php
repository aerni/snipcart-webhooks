<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderCompleted extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
