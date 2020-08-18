<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;

class OrderCompleted extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
