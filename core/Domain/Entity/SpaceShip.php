<?php


namespace TDDIntro\Domain\Entity;


class SpaceShip
{
  /* @var Module[] */
  private $modules;
  private $fuel;

  public function __construct($modules = [], $fuel = 0)
  {
    $this->modules = $modules;
    $this->fuel = $fuel;
  }

  public function modules()
  {
    return $this->modules;
  }

  public function fuel()
  {
    return $this->fuel;
  }

  public function requiredFuelToLaunch()
  {
    $requiredFuel = 0;

    foreach ($this->modules as $module){
      $requiredFuel += $module->fuelRequiredToLaunch();
    }
    return $requiredFuel;
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