<?php
namespace App;

Class  Cart {
    public $items ;
    public $totalQuantity ;
    public $totalPrice;

    public function __construct($prevCart){

        if ($prevCart != null) {
            # code...
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
                }
            else {
                $this->items = [];
                $this->totalQuantity = 0;
                $this->$totalPrice = 0;
            }
    }
    public function addItem($id , $product){
         $price = (int) str_replace("$" , " " , $product->price);
         if (array_key_exists($id, $this->items)) {

        $productToAdd = $this->items[$id];
        $productToAdd ['quantity']++;
        $productToAdd['totalSinglePrice']= $productToAdd['quantity'] * $price;

        }
        else {
            $productToAdd = ['quantity'=> 1, 'totalSingleprice'=> $price , 'data'=> $product ];

        }
        $this->items[$id] = $productToAdd;
        $this->totalQuantity++;
        $this->totalPrice = $this->totalPrice +$price;
    }
public function updatePriceAndQuantity(){
    $totalPrice = 0;
    $totalQuantity =0 ;
    foreach ($this->items  as $item) {
        $totalQuantity = $item['quantity'] + $totalQuantity ;
        $totalPrice = $totalPrice + $item['totalSinglePrice'];
    }
    $this->totalPrice = $totalPrice;
    $this->totalQuantity = $totalQuantity;

}

}