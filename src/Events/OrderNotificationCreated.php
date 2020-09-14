<?php

namespace Aerni\SnipcartWebhooks\Events;

class OrderNotificationCreated extends Event
{
    public $notification;

    public function __construct($notification)
    {
        $this->notification = $notification;
    }
}
