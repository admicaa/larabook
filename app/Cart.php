<?php

namespace App;


class Cart
{
    public $items;
    public $totalQt = 0;
    public $totalPrice=0;
    public function __construct($oldCart){
        if($oldCart!=null){
            $this->items = $oldCart->items;
            $this->totalQt = $oldCart->totalQt;
            $this->totalPrice = $oldCart->totalPrice;
        }

    }
    
    public function add($item,$id){
        $stordItem = ['Qty'=>0,'price'=>$item->price,'item'=>$item];
        if ($this->items){
            if(array_key_exists("k".$id,$this->items)){
                print(0);
                $stordItem = $this->items["k".$id];
            }
        }
        
        $stordItem['Qty']++;
        $stordItem['price'] =  $item->price * $stordItem['Qty'];
        $this->totalQt ++;
        $this->totalPrice = $this->totalPrice +  $item->price;
        $this->items["k".$id] = $stordItem;
    }


}
