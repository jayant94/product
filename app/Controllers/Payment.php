<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use Exception;
use App\Models\CustomerModel;
use App\Models\OrderItemModel;
use App\Models\PaymentDetailModel;

require_once 'stripe/init.php';

class Payment extends Master
{
    protected $itemName = "Demo Product";
    protected $itemPrice = 25;
    protected $currency = "USD";
    protected $stripe;
    public function __construct()
    {
        $this->stripe = new \Stripe\StripeClient('sk_test_711G2wkskultWdttYvo7eKfX');
    }
    public function index()
    {
        return view('product/payment', ['itemName' => $this->itemName, 'itemPrice' => $this->itemPrice, 'currency' => $this->currency]);
    }
    public function paymentInit()
    {

        try {
            $quantity = $_POST['qty'];
            $priceDetail = $this->stripe->prices->create([
                'currency' => 'usd',
                'unit_amount' => $_POST['price'] * 100,
                'product_data' => ['name' => 'Gold Plan'],
            ]);

            $price = $priceDetail->id;
            // die;
            if (!$price || $price == 'price_12345') {
                http_response_code(500);
                echo "You must set a Price ID in the `.env` file. Please see the README";
                exit;
            }

            // For sample support and debugging. Not required for production:
            \Stripe\Stripe::setAppInfo(
                "stripe-samples/checkout-one-time-payments",
                "0.0.2",
                "https://github.com/stripe-samples/checkout-one-time-payments"
            );

            \Stripe\Stripe::setApiKey('sk_test_711G2wkskultWdttYvo7eKfX');

            if ($_SERVER['REQUEST_METHOD'] != 'POST') {
                echo 'Invalid request';
                exit;
            }
            $data = [
                'name' => $this->request->getPost('name'),
                'email' => $this->request->getPost('email'),
                'contact' => $this->request->getPost('contact')
            ];

            $customerModel = new CustomerModel();


            $insertId = $customerModel->addCustomer($data);
            session()->set('cid', $insertId);
            $orderItemModel = new OrderItemModel();


            foreach (session()->get('item') as $item) {
                $data = [
                    'qty' => $item['qty'],
                    'price' => $item['price'],
                    'name' => $item['name'],
                    'customer_id' => $insertId
                ];

                $orderItemModel->insert($data);
            }

            $domain_url = 'http://localhost/payment/server/php/public';


            // Create new Checkout Session for the order
            // Other optional params include:
            // [billing_address_collection] - to display billing address details on the page
            // [customer] - if you have an existing Stripe Customer ID
            // [customer_email] - lets you prefill the email input in the form
            // [automatic_tax] - to automatically calculate sales tax, VAT and GST in the checkout page
            // For full details see https://stripe.com/docs/api/checkout/sessions/create
            // ?session_id={CHECKOUT_SESSION_ID} means the redirect will have the session ID set as a query param
            $checkout_session = \Stripe\Checkout\Session::create([
                'success_url' => site_url() . '/success/{CHECKOUT_SESSION_ID}/',
                'cancel_url' => site_url() .  '/canceled',
                'mode' => 'payment',
                // 'automatic_tax' => ['enabled' => true],
                'line_items' => [[
                    'price' => $price,
                    'quantity' => $quantity,
                ]]
            ]);

            header("HTTP/1.1 303 See Other");
            header("Location: " . $checkout_session->url);
            exit();
        } catch (Exception $ex) {
            print_r($ex);
        }
    }
    public function getStatus($id)
    {
        \Stripe\Stripe::setApiKey('sk_test_711G2wkskultWdttYvo7eKfX');
        $checkout_session = \Stripe\Checkout\Session::retrieve($id);
        $data['status'] = $checkout_session->status;
        $data['method'] = 'card';
        $data['transaction_id'] = $id;
        $data['customer_id'] = session()->get('cid');

        $paymentDetailModel = new PaymentDetailModel();

        // Insert payment details into the database
        $insertedId = $paymentDetailModel->insertPaymentDetail([
            'status' => $checkout_session->status,
            'method' => 'card',
            'transaction_id' => $id,
            'customer_id' => session()->get('cid')
        ]);
        // print_r($data);
        return view('product/status', $data);
    }
    public function cancel()
    {
        return view('product/cancel');
    }
}
