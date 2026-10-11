<?php

namespace App\Services;

require_once "./Models/Product.php";

use App\Models\Product;

class Cart
{

    public array $items = [];

    public function addProduct(Product $product)
    {

        $this->items[] = $product;

    }

    public function removeProduct($productName)
    {
        foreach ($this->items as $index => $item) {

            if ($item->getName() == $productName) {
                unset($this->items[$index]);
            }

        }
    }

    public function showCart(){
        foreach ($this->items as $item) {
            echo $item->getName() . " - " . $item->getPrice() . PHP_EOL;
        }
    }

    public function subTotal(){

        $price = 0;
        foreach ($this->items as $item) {
            $price += $item->getPrice();
        }

        return $price;
    }

    public function taxes(){
        return $this->subTotal() * 0.19;
    }

    public function total(){
        return $this->subtotal() + $this->taxes();
    }

}