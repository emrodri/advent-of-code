<?php

use AdventOfCode\Domain\Entity\Amplifier;
use AdventOfCode\Domain\Entity\Programs\AmplifierControllerSoftware;

require __DIR__ . '/../config.php';

$input = file_get_contents(dirname(__FILE__) . "/input.txt");
$memoryState = explode(',', $input);
$outputs = [];
for ($i = 0; $i < 5; $i++) {
  for ($j = 0; $j < 5; $j++) {
    for ($k = 0; $k < 5; $k++) {
      for ($l = 0; $l < 5; $l++) {
        for ($m = 0; $m < 5; $m++) {
          if (count(array_unique([$i, $j, $k, $l, $m])) == 5) {
            $ampOutput1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $i)->run(0);
            $ampOutput2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $j)->run($ampOutput1);
            $ampOutput3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $k)->run($ampOutput2);
            $ampOutput4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $l)->run($ampOutput3);
            $ampOutput5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $m)->run($ampOutput4);
            $outputs[] = $ampOutput5;
          }
        }
      }
    }
  }
}
echo "Highest signal that can be sent to the thrusters => " . max($outputs) . PHP_EOL;

$outputs = [];
for ($i = 5; $i < 10; $i++) {
  for ($j = 5; $j < 10; $j++) {
    for ($k = 5; $k < 10; $k++) {
      for ($l = 5; $l < 10; $l++) {
        for ($m = 5; $m < 10; $m++) {
          if (count(array_unique([$i, $j, $k, $l, $m])) == 5) {
            $lastSignal = $signal = 0;
            $amp1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $i);
            $amp2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $j);
            $amp3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $k);
            $amp4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $l);
            $amp5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), $m);
            while ($signal !== null) {
              $signal = $amp1->run($signal);
              $signal = $amp2->run($signal);
              $signal = $amp3->run($signal);
              $signal = $amp4->run($signal);
              $signal = $amp5->run($signal);
              if ($signal !== null) {
                $lastSignal = $signal;
              }
            }
            $outputs[] = $lastSignal;
          }
        }
      }
    }
  }
}
echo "Highest signal that can be sent to the thrusters on Fallback=> " . max($outputs).PHP_EOL;
