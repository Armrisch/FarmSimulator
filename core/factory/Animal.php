<?php

namespace core\factory;

abstract class Animal
{
    /**
     * @param int $days
     * @return int
     */
    abstract public function getProductsByDays($days = 7): int;

    /**
     * @return Animal
     */
    abstract public function create(): Animal;

    /**
     * @return String
     */
    public function getType(): String
    {
        return basename(str_replace('\\', '/', get_class($this)));
    }
}