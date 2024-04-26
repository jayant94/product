<?php
namespace App\Models;

use CodeIgniter\Model;

class OrderItemModel extends Model
{
    protected $table = 'order_item';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'description', 'price','customer_id'];
}
