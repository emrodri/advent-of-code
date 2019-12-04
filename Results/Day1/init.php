<?php

use AdventOfCode\Domain\Entity\Module;
use AdventOfCode\Domain\Entity\SpaceShip;

require '../config.php';


$inputs = file(dirname(__FILE__) . "/inputs.txt");
$modules = [];
foreach ($inputs as $mass) {
  $modules[] = Module::ofMass(intval($mass));
}
$spaceShip = new SpaceShip($modules);
echo 'El resultado es '.$spaceShip->fuelRequiredToLaunch().PHP_EOL;