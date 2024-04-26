<?php

namespace App\Controllers;

class Checkout extends Master
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
       
        // session()->
        $data['productRecord'] =  session()->get('item');
        $total = 0;
        foreach ($data['productRecord'] as $key => $value){
            $total = $value['price'] * $value['qty'] + $total;
        }

        $data['total'] = $total;
        return view('product/checkout', $data);
        
    }
    
}
