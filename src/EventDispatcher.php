<?php

namespace Aerni\SnipcartWebhooks;

use Aerni\SnipcartWebhooks\Events\OrderCompleted;
use Aerni\SnipcartWebhooks\Events\OrderNotificationCreated;
use Aerni\SnipcartWebhooks\Events\OrderPaymentStatusChanged;
use Aerni\SnipcartWebhooks\Events\OrderRefundCreated;
use Aerni\SnipcartWebhooks\Events\OrderStatusChanged;
use Aerni\SnipcartWebhooks\Events\OrderTrackingNumberChanged;
use Aerni\SnipcartWebhooks\Events\SubscriptionCancelled;
use Aerni\SnipcartWebhooks\Events\SubscriptionCreated;
use Aerni\SnipcartWebhooks\Events\SubscriptionInvoiceCreated;
use Aerni\SnipcartWebhooks\Events\SubscriptionPaused;
use Aerni\SnipcartWebhooks\Events\SubscriptionResumed;
use Illuminate\Http\Request;

class EventDispatcher
{
    public function dispatch(Request $request): void
    {
        $event = $request->json()->get('eventName');

        switch ($event) {
            case 'order.completed':
                OrderCompleted::dispatch($request->json());
                break;

            case 'order.status.changed':
                OrderStatusChanged::dispatch($request->json());
                break;

            case 'order.paymentStatus.changed':
                OrderPaymentStatusChanged::dispatch($request->json());
                break;

            case 'order.trackingNumber.changed':
                OrderTrackingNumberChanged::dispatch($request->json());
                break;

            case 'order.refund.created':
                OrderRefundCreated::dispatch($request->json());
                break;

            case 'order.notification.created':
                OrderNotificationCreated::dispatch($request->json());
                break;

            case 'subscription.created':
                SubscriptionCreated::dispatch($request->json());
                break;

            case 'subscription.cancelled':
                SubscriptionCancelled::dispatch($request->json());
                break;

            case 'subscription.paused':
                SubscriptionPaused::dispatch($request->json());
                break;

            case 'subscription.resumed':
                SubscriptionResumed::dispatch($request->json());
                break;

            case 'subscription.invoice.created':
                SubscriptionInvoiceCreated::dispatch($request->json());
                break;
        }
    }
}
