<?php

use AdventOfCode\Domain\Entity\FuelManagement;
use AdventOfCode\Domain\Entity\Wire;

require __DIR__.'/../config.php';

$wires = file(dirname(__FILE__) . "/inputs.txt");
$wire1 = Wire::fromString($wires[0]);
$wire2 = Wire::fromString($wires[1]);
$fuelManagement= FuelManagement::create();
$fuelManagement->addWire($wire1);
$fuelManagement->addWire($wire2);

print_r("Nearest Point is :".$fuelManagement->findNearestIntersections());
print_r("Fastes Point is :".$fuelManagement->findFasterIntersections());