<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\SignatureValidator;
use Aerni\SnipcartWebhooks\Exceptions\ApiSecretNotFoundException;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use App\Http\Middleware\VerifyCsrfToken;

class SnipcartWebhooksServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Route::macro('webhooks', function (string $url, string $name = 'default') {
            Route::post($url, '\Aerni\SnipcartWebhooks\SnipcartWebhooksController')->name("snipcart-webhooks-{$name}")->withoutMiddleware([VerifyCsrfToken::class]);
        });

        $this->app->singleton(SignatureValidator::class, function () {
            return new SignatureValidator($this->apiSecret());
        });

        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/snipcart-webhooks.php' => config_path('snipcart-webhooks.php'),
            ], 'config');
        }
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/snipcart-webhooks.php', 'snipcart-webhooks');
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
