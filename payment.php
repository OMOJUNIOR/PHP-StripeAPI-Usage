<?php

require __DIR__.'/vendor/autoload.php';

use Omojunior\PhpStripeApiUsage\controller\Payment;

$payment = new Payment();
$payment->checkout();
