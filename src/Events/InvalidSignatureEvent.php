<?php

namespace Aerni\SnipcartWebhooks\Events;

use Aerni\SnipcartWebhooks\Events\Event;
use Illuminate\Http\Request;

class InvalidSignatureEvent extends Event
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
