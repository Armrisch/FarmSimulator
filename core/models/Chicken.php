<?php

namespace core\models;
use core\factory\Animal;

class Chicken extends Animal
{
    private $productType = 'яйцо';

    public function create(): Animal
    {
        return new self;
    }

    public function getProductType(): String
    {
        return $this->productType;
    }

    public function getProductsByDays($days = 7) : int
    {
        $products = 0;
        for($j = 0; $j < $days; $j++){
            $products += rand(0, 1);
        }

        return $products;
    }
}