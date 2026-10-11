<?php

class Money{

    public static function format(float $amount){
        return "$" . number_format($amount, 2);
    }

}

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

$monitor = new Product("Monitor samsung", 100.5, 5);
$keyboar = new Product("Teclado samsung", 60, 15);
$cart = new Cart();

$cart->addProduct($monitor);
$cart->addProduct($keyboar);
$cart->showCart();
// $cart->removeProduct("Monitor samsung");
echo "El valor actual del carrito con impuestos incluidos es de " . Money::format($cart->total()) . PHP_EOL;

