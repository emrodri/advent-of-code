<?php

require __DIR__.'/../config.php';
use AdventOfCode\Domain\Entity\PlanetsMap;

$input = file_get_contents("input.txt");
$orbitsMap = PlanetsMap::createFromStringMap($input);
echo "Total orbits on OrbitMap => ".$orbitsMap->totalOrbitsInPlanetMap().PHP_EOL;
echo "Total Jumps to travel to Santa => ".$orbitsMap->numberOfJumpsForTravel("YOU", "SAN").PHP_EOL;
