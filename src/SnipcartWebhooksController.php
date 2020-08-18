<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\SnipcartWebhooksProcessor as WebhookProcessor;
use Illuminate\Http\Request;

class SnipcartWebhooksController
{
    public function __invoke(Request $request)
    {
        return (new WebhookProcessor($request))->process();
    }
}
