<?php

require __DIR__.'/../config.php';

use AdventOfCode\Domain\Entity\Computer;

$inputs = file(dirname(__FILE__) . "/input.txt");
$memory = implode(",", $inputs);

$computer = Computer::createFromMemoryString($memory);
echo "Resultado : ".$computer->runTestProgram(1);
