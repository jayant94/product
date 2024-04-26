<?php
namespace App\Models;

use CodeIgniter\Model;

class PaymentDetailModel extends Model
{
    protected $table = 'payment';
    protected $allowedFields = ['transaction_id', 'customer_id', 'method', 'status'];

    public function insertPaymentDetail($data)
    {
        // Insert payment detail into the database
        $this->insert($data);

        // Get the ID of the last inserted row
        return $this->insertID();
    }
}