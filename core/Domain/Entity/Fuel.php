<?php

namespace TDDIntro\Domain\Entity;

final class Fuel
{
  public static function fuelNeededByMass(int $mass)
  {
    $fuelNeeded = self::calculateFuel($mass);
    if ($fuelNeeded > 0 && self::fuelNeededByMass($fuelNeeded) > 0) {
      $fuelNeeded += self::fuelNeededByMass($fuelNeeded);
    }
    return $fuelNeeded;
  }

  private static function calculateFuel($mass)
  {
    return intval($mass / 3) - 2;
  }
}