<?php

namespace Aerni\SnipcartWebhooks\Events;

use Illuminate\Http\Request;

class InvalidSignatureEvent extends Event
{
    public Request $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }
}
