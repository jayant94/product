<?php

namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    protected $table = 'customer'; // Your table name

    protected $allowedFields = ['name', 'email', 'contact']; // Fields that are allowed to be mass-assigned

    public function addCustomer($data)
    {
        // Insert data into the database
        $this->insert($data);

        // Get the ID of the last inserted row
        return $this->insertID();
    }
}
