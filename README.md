# Laravel Snipcart Webhooks
This package makes it super easy to setup and work with Snipcart webhooks in your Laravel application.

## Installation
Install the package using Composer.

```bash
composer require aerni/snipcart-webhooks
```

Set your Snipcart `Live Secret` and `Test Secret` in your `.env`. You can find them in your [Snipcart Dashboard](https://app.snipcart.com/dashboard/account/credentials).

```env
SNIPCART_LIVE_SECRET=********************************
SNIPCART_TEST_SECRET=********************************
```

You may also publish the config of the package.

```bash
php artisan vendor:publish --provider="Aerni\SnipcartWebhooks\SnipcartWebhooksServiceProvider"
```

The following config will be published to `config/snipcart-webhooks.php`.

```php
return [

    /*
    |--------------------------------------------------------------------------
    | Snipcart API Keys
    |--------------------------------------------------------------------------
    |
    | Your secret Snipcart API Keys for the Live and Test Environment.
    |
    */

    'live_secret' => env('SNIPCART_LIVE_SECRET'),
    'test_secret' => env('SNIPCART_TEST_SECRET'),

    /*
    |--------------------------------------------------------------------------
    | Test Mode
    |--------------------------------------------------------------------------
    |
    | Set this to "false" to authenticate using the "live_secret".
    | You probably want to do this in production only.
    |
    */

    'test_mode' => env('SNIPCART_TEST_MODE', true),

];
```

## Basic Usage
1. Register a webhook receiving route
2. Create Event Listeners or Subscribers to listen for Snipcart Events.

## Routing
Go to your [Snipcart Dashboard](https://app.snipcart.com/dashboard/webhooks) and configure the URL where you want to receive the webhook requests. Register that route in `routes/web.php` using the provided `Route::snipcart` macro.

```php
Route::snipcart('webhook-receiving-url');
```

This will register a `POST` route to a controller provided by this package. The route will be registered without the `VerifyCsrfToken` middleware, because Snipcart has no way of getting a csrf-token.

## Events & Listeners
Each incoming Snipcart webhook request will trigger its corresponding Laravel Event. [Create and register](https://laravel.com/docs/7.x/events) one or more Event Listeners or Subscribers and do your magic.

### Overview
| Snipcart Events | Laravel Events |
|-----------------|----------------|
| [OrderCompleted](#ordercompleted) | [order.completed](https://docs.snipcart.com/v3/webhooks/order-events#order-completed)
| [OrderStatusChanged](#orderstatuschanged) | [order.status.changed](https://docs.snipcart.com/v3/webhooks/order-events#order-status-changed)
| [OrderPaymentStatusChanged](#orderpaymentstatuschanged) | [order.paymentStatus.changed](https://docs.snipcart.com/v3/webhooks/order-events#order-paymentStatus-changed)
| [OrderTrackingNumberChanged](#ordertrackingnumberchanged) | [order.trackingNumber.changed](https://docs.snipcart.com/v3/webhooks/order-events#order-trackingnumber-changed)
| [OrderRefundCreated](#orderrefundcreated) | [order.refund.created](https://docs.snipcart.com/v3/webhooks/order-events#order-refund-created)
| [OrderNotificationCreated](#ordernotificationcreated) | [order.notification.created](https://docs.snipcart.com/v3/webhooks/order-events#order-notification-created)
| [SubscriptionCreated](#subscriptioncreated) | [subscription.created](https://docs.snipcart.com/v3/webhooks/subscription-events#subscription-created)
| [SubscriptionCancelled](#subscriptioncancelled) | [subscription.cancelled](https://docs.snipcart.com/v3/webhooks/subscription-events#subscription-cancelled)
| [SubscriptionPaused](#subscriptionpaused) | [subscription.paused](https://docs.snipcart.com/v3/webhooks/subscription-events#subscription-paused)
| [SubscriptionResumed](#subscriptionresumed) | [subscription.resumed](https://docs.snipcart.com/v3/webhooks/subscription-events#subscription-resumed)
| [SubscriptionInvoiceCreated](#subscriptioninvoicecreated) | [subscription.invoice.created](https://docs.snipcart.com/v3/webhooks/subscription-events#subscription-invoice-created)
| [InvalidSignature](#invalidsignature) |

### OrderCompleted
`Aerni\SnipcartWebhooks\Events\OrderCompleted`

Dispatched whenever a new order is completed.

```php
public function handle(OrderCompleted $payload)
{
    $payload;
}
```

### OrderStatusChanged
`Aerni\SnipcartWebhooks\Events\OrderStatusChanged`

Dispatched whenever the status of an order changes.

```php
public function handle(OrderStatusChanged $payload)
{
    $payload;
}
```

### OrderPaymentStatusChanged
`Aerni\SnipcartWebhooks\Events\OrderPaymentStatusChanged`

Dispatched whenever the payment status of an order changes.

```php
public function handle(OrderPaymentStatusChanged $payload)
{
    $payload;
}
```

### OrderTrackingNumberChanged
`Aerni\SnipcartWebhooks\Events\OrderTrackingNumberChanged`

Dispatched whenever the tracking number of an order changes.

```php
public function handle(OrderTrackingNumberChanged $payload)
{
    $payload;
}
```

### OrderRefundCreated
`Aerni\SnipcartWebhooks\Events\OrderRefundCreated`

Dispatched whenever an order is refunded.

```php
public function handle(OrderRefundCreated $payload)
{
    $payload;
}
```

### OrderNotificationCreated
`Aerni\SnipcartWebhooks\Events\OrderNotificationCreated`

Dispatched whenever a notification is added to an order.

```php
public function handle(OrderNotificationCreated $payload)
{
    $payload;
}
```

### SubscriptionCreated
`Aerni\SnipcartWebhooks\Events\SubscriptionCreated`

Dispatched whenever a new subscription is created.

```php
public function handle(SubscriptionCreated $payload)
{
    $payload;
}
```

### SubscriptionCancelled
`Aerni\SnipcartWebhooks\Events\SubscriptionCancelled`

Dispatched whenever a subscription is cancelled.

```php
public function handle(SubscriptionCancelled $payload)
{
    $payload;
}
```

### SubscriptionPaused
`Aerni\SnipcartWebhooks\Events\SubscriptionPaused`

Dispatched whenever a subscription is paused.

```php
public function handle(SubscriptionPaused $payload)
{
    $payload;
}
```

### SubscriptionResumed
`Aerni\SnipcartWebhooks\Events\SubscriptionResumed`

Dispatched whenever a subscription is resumed.

```php
public function handle(SubscriptionResumed $payload)
{
    $payload;
}
```

### SubscriptionInvoiceCreated
`Aerni\SnipcartWebhooks\Events\SubscriptionInvoiceCreated`

Dispatched whenever a new invoice is added to an existing subscription.

```php
public function handle(SubscriptionInvoiceCreated $payload)
{
    $payload;
}
```

### InvalidSignature
`Aerni\SnipcartWebhooks\Events\InvalidSignature`

Dispatched whenever the signature of the webhook request is invalid.

```php
public function handle(InvalidSignature $request)
{
    $request;
}
```

## Tests
Run the tests like this:

```bash
vendor/bin/phpunit
```
