<?php

namespace App\Models;

class Product
{

    public function __construct(
        private string $name,
        private float $price,
        private int $stock
    ) {
    }

    public function showProduct()
    {

        echo $this->name;

    }

    public function decreaseStock(int $quantity)
    {

        if ($quantity > $this->stock) {

            echo "no hay suficiente stock";
            return;
        }

        $this->stock -= $quantity;

    }

    public function getStock()
    {
        return $this->stock;
    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

}