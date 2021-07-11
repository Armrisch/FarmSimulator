<?php

namespace core\models;

use core\factory\Animal;
use core\interfaces\FarmInterface;

class Farm implements FarmInterface
{
    protected $animals = [];
    protected $products = [];
    protected $lastCollectProducts = [];
    protected $types = [];

    /**
     * @return String
     */
    private function generateIdentityKey(): String
    {
        return uniqid('id_');
    }

    private function setTypes(): void
    {
        $this->types = array_keys($this->getAnimalsCount());
    }

    /**
     * @param $assoc
     * @return string
     */
    private function getStringFromAssoc($assoc): string
    {
        $string = '';

        foreach ($assoc as $key => $value) {
            $string .= "$key = $value\n";
        }

        return $string;
    }

    /**
     * @param string $type
     * @return array|mixed|string
     */
    public function getAnimalsCount($type = 'array')
    {
        $types = array_column($this->animals, 'type');

        if ($type === 'array') {
            return array_count_values($types);
        } elseif ($type === 'string') {
            return $this->getStringFromAssoc(array_count_values($types));
        }

        return [];
    }


    public function collectProducts(): void
    {
        $temp = [];
        foreach ($this->animals as $animal) {

            $animal = $animal['animal'];
            $type = $animal->getProductType();
            $productCount = $animal->getProductsByDays();

            if (isset($temp[$type])) {
                $temp[$type] += $productCount;
            } else {
                $temp[$type] = $productCount;
            }

            if (isset($this->products[$type])) {
                $this->products[$type] += $productCount;
            } else {
                $this->products[$type] = $productCount;
            }
        }

        $this->lastCollectProducts = $temp;
    }

    /**
     * @param string $type
     * @return array|mixed|string|null
     */
    public function getLastCollectProductsCount($type = 'array')
    {
        if ($type === 'array') {
            return $this->lastCollectProducts;
        } elseif ($type === 'string') {
            return $this->getStringFromAssoc($this->lastCollectProducts);
        }

        return null;

    }

    /**
     * @param string $type
     * @return array|mixed|string
     */
    public function getAllProductsCount($type = 'array')
    {
        if ($type === 'array') {
            return $this->products;
        } elseif ($type === 'string') {
            return $this->getStringFromAssoc($this->products);
        }

        return [];
    }

    /**
     * @param int $count
     * @param Animal $animal
     * @return void
     */
    public function buyAnimals(int $count, Animal $animal): void
    {
        if ($count > 0) {

            for ($i = 0; $i < $count; $i++) {

                $key = $this->generateIdentityKey();
                $this->animals["$key"]['animal'] = $animal->create();
                $this->animals["$key"]['type'] = $animal->getType();
            }
        }

        $this->setTypes();
    }
}

