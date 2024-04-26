<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/cart', 'Home::cartPage');
$routes->get('/checkout', 'Checkout::index');
$routes->get('/payment', 'Payment::index');
$routes->get('/order', 'Home::orderDetail');

$routes->get('/add-to-cart/(:num)', 'Home::addToCart/$1');
$routes->get('/clear-cart', 'Home::clearCart');

// app/Config/Routes.php

$routes->post('create-checkout-session', 'Payment::paymentInit');
$routes->get('success/(:any)', 'Payment::getStatus/$1');
$routes->get('canceled', 'Payment::cancel');