<?php


namespace AdventOfCode\Domain\Entity;


final class SpaceShip
{
  /** @var Module[] */
  private $modules;
  /** @var int  */
  private $fuel;

  public function __construct($modules = [], $fuel = 0)
  {
    $this->modules = $modules;
    $this->fuel = $fuel;
  }

  public function fuelRequiredToLaunch()
  {
    $totalFuel = 0;
    foreach ($this->modules as $module) {
      $totalFuel += $module->fuelNeeded();
    }
    return $totalFuel;
  }

}