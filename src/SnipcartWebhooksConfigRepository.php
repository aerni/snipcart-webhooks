<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\Exceptions\ApiSecretNotFoundException;

class SnipcartWebhooksConfigRepository
{
    /**
     * Get the secret Snipcart API Key by mode.
     *
     * @return string
     */
    public function apiSecret(): string
    {
        $mode = config('snipcart-webhooks.test_mode');

        $apiSecret = $mode
            ? config('snipcart-webhooks.test_secret')
            : config('snipcart-webhooks.live_secret');

        if (! $apiSecret) {
            throw new ApiSecretNotFoundException($mode);
        }

        return $apiSecret;
    }
}
