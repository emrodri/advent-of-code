<?php

use AdventOfCode\Domain\Entity\Amplifier;
use AdventOfCode\Domain\Entity\Computer;

require __DIR__ . '/../config.php';

$inputs = file(dirname(__FILE__) . "/input.txt");
$memory = implode(",", $inputs);
$computer1 = Computer::createFromMemoryString($memory);
$computer2 = Computer::createFromMemoryString($memory);
$computer3 = Computer::createFromMemoryString($memory);
$computer4 = Computer::createFromMemoryString($memory);
$computer5 = Computer::createFromMemoryString($memory);
$outputs= [];
for ($i = 0; $i < 5; $i++) {
  for ($j = 0; $j < 5; $j++) {
    for ($k = 0; $k < 5; $k++) {
      for ($l = 0; $l < 5; $l++) {
        for ($m = 0; $m < 5; $m++) {
          if (count(array_unique([$i, $j, $k, $l, $m])) == 5) {
            $ampOutput1 = Amplifier::installOn($computer1, $i)->run(0);
            $ampOutput2 = Amplifier::installOn($computer2, $j)->run($ampOutput1);
            $ampOutput3 = Amplifier::installOn($computer3, $k)->run($ampOutput2);
            $ampOutput4 = Amplifier::installOn($computer4, $l)->run($ampOutput3);
            $ampOutput5 = Amplifier::installOn($computer5, $m)->run($ampOutput4);
            $outputs[] = $ampOutput5;
          }
        }
      }
    }
  }
}

echo "Highest signal that can be sent to the thrusters => ". max($outputs);


