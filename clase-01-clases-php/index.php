<?php

# Librerias Necesarias
require_once "./Helpers/Money.php";
require_once "./Models/Product.php";
require_once "./Services/Cart.php";

# Etiquetas para uso de las clases
use App\Helpers\Money;
use App\Models\Product;
use App\Services\Cart;


$monitor = new Product("Monitor samsung", 100.5, 5);
$keyboar = new Product("Teclado samsung", 60, 15);
$cart = new Cart();

$cart->addProduct($monitor);
$cart->addProduct($keyboar);
$cart->showCart();
// $cart->removeProduct("Monitor samsung");
echo "El valor actual del carrito con impuestos incluidos es de " . Money::format($cart->total()) . PHP_EOL;