<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderRefundCreated extends Event
{
    public $refund;

    public function __construct($refund)
    {
        $this->refund = $refund;
    }
}
