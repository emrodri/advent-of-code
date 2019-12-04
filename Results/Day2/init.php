<?php
require __DIR__.'/../../../vendor/autoload.php';

use AdventOfCode\Domain\Entity\Computer;

$inputs = file(dirname(__FILE__) . "/inputs_day_2.txt");
$instructions = implode(",", $inputs);
$computer = Computer::createFromMemory($instructions);

echo "Resultado parte 1 " . $computer->runIntCodeProgram() . PHP_EOL;