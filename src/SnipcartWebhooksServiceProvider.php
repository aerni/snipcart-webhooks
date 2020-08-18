<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\Exceptions\ApiSecretNotFoundException;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SnipcartWebhooksServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(SignatureValidator::class, function () {
            return new SignatureValidator($this->apiSecret());
        });

        $this->mergeConfigFrom(__DIR__.'/../config/snipcart-webhooks.php', 'snipcart-webhooks');
    }

    public function boot()
    {
        Route::macro('snipcart', function (string $url, string $name = 'default') {
            Route::post($url, '\Aerni\SnipcartWebhooks\SnipcartWebhooksController')->name("snipcart-webhooks-{$name}")->withoutMiddleware([VerifyCsrfToken::class]);
        });

        $this->publishes([
            __DIR__.'/../config/snipcart-webhooks.php' => config_path('snipcart-webhooks.php'),
        ], 'config');
    }

    /**
     * Returns the secret Snipcart API Key.
     *
     * @return string
     */
    protected function apiSecret()
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
