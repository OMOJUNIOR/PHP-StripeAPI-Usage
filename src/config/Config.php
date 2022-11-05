<?php

namespace Omojunior\PhpStripeApiUsage\config;

use Stripe\Stripe;

class Config
{
    private $apiKey;

    public function __construct()
    {
        // Provide your stripe API key here
        $this->apiKey = Stripe::setApiKey('sk_test_4eC39HqLyjWDarjtT1zdp7dc');
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }
}
