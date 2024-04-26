<?php

namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\Controller;
// Publishable key - pk_test_HEjrYOnsGpOD3DLR9UaHR3pJ
// Secret key - sk_test_711G2wkskultWdttYvo7eKfX
class Master extends BaseController
{
    protected $productList;
    protected $cart = array();
    public function __construct()
    {
        $this->productList = new ProductModel();
        
    }
   
}
