<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;

class OrderPaymentStatusChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
