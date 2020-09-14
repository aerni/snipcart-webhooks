<?php

namespace Aerni\SnipcartWebhooks\Events;

use Illuminate\Http\Request;

class InvalidSignature extends Event
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
