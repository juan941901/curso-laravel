<?php
namespace App\Models;
use App\Models\Product;

class PhysicalProduct extends Product
{
    public function __construct(
        private string $name,
        private float $price,
        private int $stock,
        private float $weithg
    ) {
        parent::__construct($name, $price);
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
}