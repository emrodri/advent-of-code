<?php


use AdventOfCode\Domain\Entity\FuelDepotPassword;

require __DIR__ . '/../config.php';


$inputsMin = 108457;
$inputsMax = 562041;
$validPasswords = 0;
for ($i = $inputsMin; $i <= $inputsMax; $i++) {
  $fuelDepotPassword = FuelDepotPassword::fromInput($i);
  if($fuelDepotPassword->isValid()){
    $validPasswords ++;
  }
}
echo $validPasswords;