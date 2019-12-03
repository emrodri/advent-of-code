<?php

namespace TDDIntro\Domain\Entity;


final class Module
{
  /**
   * @var int
   */
  private $mass;

  private function __construct(int $mass)
  {
    $this->assertModuleHasMass($mass);
    $this->mass = $mass;
  }

  public static function ofMass($mass)
  {
    return new self($mass);
  }

  public function fuelNeeded()
  {
    return Fuel::fuelNeededByMass($this->mass);
  }

  private function assertModuleHasMass(int $mass)
  {
    if ($mass <= 0) {
      throw new ModuleHasNotMassException();
    }
  }

  public function mass()
  {
    return $this->mass;
  }
}