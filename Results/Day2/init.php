<?php
require '../config.php';

use AdventOfCode\Domain\Entity\Computer;

$inputs = file(dirname(__FILE__) . "/inputs_day_2.txt");
$memory = implode(",", $inputs);
$computer = Computer::createFromMemoryString($memory);

echo "Resultado parte 1 " . $computer->runIntCodeProgramWithInputs(12, 2) . PHP_EOL;

$computer = Computer::createFromMemoryString($memory);
for ($noun = 0; $noun < 100; $noun++) {
  for ($verb = 0; $verb < 100; $verb++) {
    if($computer->runIntCodeProgramWithInputs($noun, $verb)==19690720){
      echo "Resultado parte 2 " . (100 * $noun + $verb);
      die();
    }
  }
}