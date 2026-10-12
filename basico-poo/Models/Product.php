<?php

namespace App\Models;

class Product
{

    public function __construct(
        private string $name,
        private float $price
    ) {
    }

    public function showProduct()
    {

        echo $this->name . PHP_EOL;

    }

    public function getName(){
        return $this->name;
    }

    public function getPrice(){
        return $this->price;
    }

}