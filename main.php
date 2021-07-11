<?php

require_once realpath('vendor/autoload.php');

use core\models\Farm;
use core\models\Cow;
use core\models\Chicken;

$farm = new Farm();
$cow = new Cow();
$chicken = new Chicken();

$farm->buyAnimals(20, $chicken);
$farm->buyAnimals(10, $cow);
echo $farm->getAnimalsCount('string');
echo "----------------------\n";

$farm->collectProducts();
echo $farm->getLastCollectProductsCount('string');
echo "----------------------\n";

$farm->buyAnimals(5, $chicken);
$farm->buyAnimals(1, $cow);
echo $farm->getAnimalsCount('string');
echo "----------------------\n";

$farm->collectProducts();
echo $farm->getLastCollectProductsCount('string');
echo "----------------------\n";

echo $farm->getAllProductsCount('string');
