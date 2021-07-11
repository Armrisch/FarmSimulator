<?php

namespace core\models;
use core\factory\Animal;

class Cow extends Animal
{
    private $productType = 'молоко';

    public function create() : Animal
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
            $products += rand(8, 12);
        }

        return $products;
    }
}