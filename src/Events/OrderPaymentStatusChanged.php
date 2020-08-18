<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderPaymentStatusChanged extends Event
{
    public $order;

    public function __construct($order)
    {
        $this->order = $order;
    }
}
