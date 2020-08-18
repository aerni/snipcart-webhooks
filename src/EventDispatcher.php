<?php

namespace Aerni\SnipcartWebhooks;

use Illuminate\Http\Request;
use Aerni\SnipcartWebhooks\Events\OrderCompleted;
use Aerni\SnipcartWebhooks\Events\OrderStatusChanged;
use Aerni\SnipcartWebhooks\Events\SubscriptionPaused;
use Aerni\SnipcartWebhooks\Events\SubscriptionCreated;
use Aerni\SnipcartWebhooks\Events\SubscriptionResumed;
use Aerni\SnipcartWebhooks\Events\SubscriptionCancelled;
use Aerni\SnipcartWebhooks\Events\OrderPaymentStatusChanged;
use Aerni\SnipcartWebhooks\Events\OrderTrackingNumberChanged;
use Aerni\SnipcartWebhooks\Events\SubscriptionInvoiceCreated;

class EventDispatcher
{
    public function dispatch(Request $request): void
    {
        $event = $request->json()->get('eventName');

        switch ($event) {
            case 'order.completed':
                OrderCompleted::dispatch($request->json());
            case 'order.status.changed':
                OrderStatusChanged::dispatch($request->json());
            case 'order.paymentStatus.changed':
                OrderPaymentStatusChanged::dispatch($request->json());
            case 'order.trackingNumber.changed':
                OrderTrackingNumberChanged::dispatch($request->json());
            case 'subscription.created':
                SubscriptionCreated::dispatch($request->json());
            case 'subscription.cancelled':
                SubscriptionCancelled::dispatch($request->json());
            case 'subscription.paused':
                SubscriptionPaused::dispatch($request->json());
            case 'subscription.resumed':
                SubscriptionResumed::dispatch($request->json());
            case 'subscription.invoice.created':
                SubscriptionInvoiceCreated::dispatch($request->json());
            break;
        }
    }
}
