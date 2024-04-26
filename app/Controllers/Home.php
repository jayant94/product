<?php

namespace App\Controllers;
// use 
use App\Models\OrderModel;
class Home extends Master
{
    public function __construct(){
        parent::__construct();
    }
    public function index()
    {
        $data['productRecord'] = $this->productList->findAll();
       
        return view('product/index',$data);
    }
    public function cartPage(){
        // $data['productRecord'] = $this->productList->findAll();
        $data['productRecord'] =  session()->get('item');
        return view('product/cart',$data);
    }
    public function addToCart($id){
        // echo $id;
        if (session()->get('item') != '') {
            $this->cart =   session()->get('item');
       
        } 
      
        $record =$this->productList->find($id);
        $record['qty'] = 1;
        // print_r($this->cart);
        array_push($this->cart,$record);
        session()->set('item',$this->cart);
        return redirect()->to('/cart');
    }
    public function clearCart(){
        session()->destroy();
        return redirect()->to('/');
    }
    public function orderDetail(){
        $orderModel = new OrderModel();
        $data['orders'] = $orderModel->getOrderDetails();
        // print_r($data);
        return view('product/order_view', $data);

    }
    public function update(){
        // $list =   session()->get('item');
        //     for ($i = 0; $i < count($list); $i++) {
        //         $list[$i]['qty'] = +1;
        //     }
        //     print_r($list);
        // if (session()->get('item') != '') {
           
       
        // } else {
        //     $record = $this->productList->find($id);
        //     $record['qty'] = 1;
        //     array_push($this->cart, array($record));
        // }
        // print_r($this->cart);
        
        // session()->set('item', $this->cart);
        // return redirect()->back();
    }

}