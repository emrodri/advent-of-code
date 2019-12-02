<?php

namespace TDDIntro\Domain\Entity;


final class Module
{
  /**
   * @var int
   */
  private $mass;

  public function __construct(int $mass)
  {
    $this->mass = $mass;
  }

  public function fuelRequiredToLaunch()
  {
    $fuelRequiredByModuleMass = floor($this->mass / 3) - 2;
    $fuelRequiredByModuleMass += $this->fuelRequiredByFuel($fuelRequiredByModuleMass);
    return $fuelRequiredByModuleMass;
  }

  private function fuelRequiredByFuel(int $fuelRequired)
  {
    $additionalFuelRequired = 0;
    $remainingFuelRequired = $fuelRequired;
    while (($remainingFuelRequired = floor($remainingFuelRequired / 3) - 2) > 0){
      $additionalFuelRequired += $remainingFuelRequired;
    }
    return $additionalFuelRequired;
  }

}