<?php

namespace Aerni\SnipcartWebhooks\Exceptions;

use Exception;

class WebhookFailedException extends Exception
{
    public static function invalidSignature(): WebhookFailedException
    {
        return new static('The webhook signature is invalid.');
    }

    public static function noEventOrContent(): WebhookFailedException
    {
        return new static('The request is missing the webhook event name and/or content.');
    }
}
