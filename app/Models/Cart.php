<?php

namespace App\Models;

class Cart
{
    public $products = null;
    public $total_quantity = 0.00;
    public $total_price = 0;

    public function __construct($oldCart)
    {
        if ($oldCart){
            $this->products = $oldCart->products;
            $this->total_quantity = $oldCart->total_quantity;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add($product, $id){
        $storedItem = ['quantity' => 0, 'price' => $product->price, 'product' => $product];

        if ($this->products) {
            if (array_key_exists($id, $this->products)){
                $storedItem = $this->products[$id];
            }
        }
        $storedItem['quantity'] ++;
        $storedItem['price'] = $product->price * $storedItem['quantity'];
        $this->products[$id] = $storedItem;
        $this->total_quantity ++;
        $this->total_price += $product->price;
    }

    public function reduceOne($id){
        $this->products[$id]['quantity'] --;
        $this->products[$id]['price'] -= $this->products[$id]['product']['price'];
        $this->total_quantity --;
        $this->total_price -= $this->products[$id]['product']['price'];

        if ($this->products[$id]['quantity'] <= 0){
            unset($this->products[$id]);
        }
    }

    public function removeProduct($id){
        $this->total_quantity -= $this->products[$id]['quantity'];
        $this->total_price -= $this->products[$id]['price'];
        unset($this->products[$id]);
    }
}
