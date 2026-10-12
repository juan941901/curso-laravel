<?php

namespace App\Services;
class Taxes{

    public function taxCalculator(float $subtotal){
        return $subtotal * 0.19;
    }
}