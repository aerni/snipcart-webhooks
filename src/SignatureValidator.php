<?php

namespace Aerni\SnipcartWebhooks;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SignatureValidator
{
    protected string $apiSecret;

    public function __construct(string $apiSecret)
    {
        $this->apiSecret = $apiSecret;
    }

    public function isValid(Request $request): bool
    {
        $requestToken = $request->header('X-Snipcart-RequestToken');

        if (! $requestToken) {
            return false;
        }

        $response = Http::withHeaders(['Accept' => 'application/json'])
                ->withBasicAuth($this->apiSecret . ':', '')
                ->get('https://app.snipcart.com/api/requestvalidation/' . $requestToken);

        if ($response->failed()) {
            return false;
        }

        return true;
    }
}
