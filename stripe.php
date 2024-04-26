<?php
// Set your secret key. Remember to switch to your live secret key in production.
// See your keys here: https://dashboard.stripe.com/apikeys
require_once 'public/stripe/init.php';
$stripe = new \Stripe\StripeClient('sk_test_tR3PYbcVNZZ796tH88S4VQ2u');



$stripe->paymentIntents->create([
    'amount' => 2000,
    'currency' => 'usd',
    'automatic_payment_methods' => ['enabled' => true],
  ]);
echo'<pre>';
print_r($stripe);