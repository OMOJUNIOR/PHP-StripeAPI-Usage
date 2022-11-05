<?php

namespace Omojunior\PhpStripeApiUsage\controller;

use Omojunior\PhpStripeApiUsage\config\Config;

class Payment
{
    public $success = 'http://localhost:8888/PHP-StripeAPI-Usage/success.php';

    public $cancel = 'http://localhost:8888/PHP-StripeAPI-Usage/cancel.php';

    public function __construct()
    {
        $this->config = new Config();
        $this->items = new ItemsController();
    }

    public function checkout()
    {
        $this->config->getApiKey(); // Get the API key from the config controller
        $products = $this->items->showItem(); // Get the products from the items controller
        $lineItems = []; //items details that will be passed to stripe
        $totalPrice = 0; // Our total price is set to zero
        foreach ($products as $product) {
            $totalPrice += $product->price;
            $lineItems[] = [
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $product['name'],
                        'description' => $product['description'],
                    ],
                    'unit_amount' => $product['price'] * 100,
                ],
                'quantity' => 1, //quantity could be calculated based on items in session
            ];
        }
        // Initialize the checkout with items passed to lineItems variable session
        $session = \Stripe\Checkout\Session::create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => $this->success.'?session_id={CHECKOUT_SESSION_ID}', // success url
            'cancel_url' => $this->cancel, // if user cancels the payment this url is called
        ]);
        // Redirect to the session url that was performed
        header('Location: '.$session->url);
    }
}
