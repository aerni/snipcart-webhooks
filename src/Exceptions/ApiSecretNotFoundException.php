<?php

namespace Aerni\SnipcartWebhooks\Exceptions;

use Exception;
use Facade\IgnitionContracts\BaseSolution;
use Facade\IgnitionContracts\ProvidesSolution;
use Facade\IgnitionContracts\Solution;

class ApiSecretNotFoundException extends Exception implements ProvidesSolution
{
    protected $mode;

    public function __construct($mode)
    {
        parent::__construct("Could not find a secret Snipcart API Key.");

        $this->mode = $mode;
    }

    public function getSolution(): Solution
    {
        $description = $this->mode
            ? "Add your secret Snipcart API Key to `SNIPCART_TEST_SECRET` in your `.env`"
            : "Add your secret Snipcart API Key to `SNIPCART_LIVE_SECRET` in your `.env`";

        return BaseSolution::create("You need to set your secret Snipcart API Key.")
            ->setSolutionDescription($description);
    }
}
