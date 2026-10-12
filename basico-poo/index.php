<?php
require_once("./vendor/autoload.php");

# Etiquetas para uso de las clases
use App\Helpers\Money;
use App\Models\PhysicalProduct;
use App\Models\DigitalProduct;
use App\Services\Cart;
use App\Services\Taxes;
use App\Services\EmailService;
use App\Services\OrderService;


$course = new DigitalProduct("Laravel", 100, "https://course.com/laravel");
$keyboard = new PhysicalProduct("Teclado samsung", 60.5, 50, 2.5);

$cart = new Cart(new Taxes());

$cart->addProduct($course);
$cart->addProduct($keyboard);
// $cart->removeProduct("Teclado samsung");
$cart->showCart();
echo "El valor actual del carrito con impuestos incluidos es de " . Money::format($cart->total()) . PHP_EOL;
$order = new OrderService(new EmailService());
$order->createOrder();