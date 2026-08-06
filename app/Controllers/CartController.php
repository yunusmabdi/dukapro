<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ProductModel;

class CartController extends BaseController
{
    protected $productModel;

    public function __construct()
    {
        $this->productModel = new ProductModel();
    }


    public function add()
    {
        dd('cart controller reached');
        $productId = $this->request->getPost('product_id');


        if(!$productId){

            return $this->response->setJSON([
                'status'=>false,
                'message'=>'No product selected'
            ]);

        }


        $cart = session()->get('cart') ?? [];


        if(isset($cart[$productId])){

            $cart[$productId]['quantity']++;

        }else{

            $cart[$productId] = [
                'product_id'=>$productId,
                'quantity'=>1
            ];

        }


        session()->set('cart',$cart);

        dd(session()->get('cart'));

        return $this->response->setJSON([
            'status'=>true,
            'message'=>'Product added to cart'
        ]);
    }


    public function update()
    {
        //
    }


    public function remove()
    {
        //
    }


    public function clear()
    {
        //
    }
}