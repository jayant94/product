<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'contact'];

    public function getOrderDetails()
    {
        return $this->select('customer.name as customer_name, customer.email, customer.contact, order_item.name as item_name, order_item.price, order_item.qty,payment.method,payment.status,payment.transaction_id as txn')
            ->join('payment', 'customer.id = payment.customer_id')
            ->join('order_item', 'payment.customer_id = order_item.customer_id')
            // ->join('product', 'order_item.name = product.name')
            ->findAll();
    }
}
