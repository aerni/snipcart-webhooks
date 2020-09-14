<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\SnipcartWebhooksConfigRepository as ConfigRepository;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class SnipcartWebhooksServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(SignatureValidator::class, function () {
            return new SignatureValidator((new ConfigRepository())->apiSecret());
        });

        $this->mergeConfigFrom(__DIR__.'/../config/snipcart-webhooks.php', 'snipcart-webhooks');
    }

    public function boot(): void
    {
        Route::macro('snipcart', function (string $url, string $name = 'default') {
            Route::post($url, '\Aerni\SnipcartWebhooks\SnipcartWebhooksController')->name("snipcart-webhooks-{$name}")->withoutMiddleware([VerifyCsrfToken::class]);
        });

        $this->publishes([
            __DIR__.'/../config/snipcart-webhooks.php' => config_path('snipcart-webhooks.php'),
        ], 'config');
    }
}
