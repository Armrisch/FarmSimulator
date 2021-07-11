<?php

namespace core\interfaces;

use core\factory\Animal;

interface FarmInterface
{
    /**
     * @param int $count
     * @param Animal $animal
     */
    public function buyAnimals(int $count, Animal $animal): void;

    public function collectProducts(): void;

    /**
     * @return mixed
     */
    public function getAnimalsCount();

    /**
     * @return mixed
     */
    public function getAllProductsCount();

    /**
     * @return mixed
     */
    public function getLastCollectProductsCount();

}