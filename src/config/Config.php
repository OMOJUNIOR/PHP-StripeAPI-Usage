<?php

namespace Omojunior\PhpStripeApiUsage\config;

use Stripe\Stripe;

class Config
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = Stripe::setApiKey('sk_test_51LcBImAmPTdV3UZb0Ob7b47wRgBtDaZqWqIiK9FjlvufbZL6XrZ7CuuN9lO1Pkh7ZpM5znYblMuNXmjXbAYCFZbs008G0ASdJ5');
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }
}
