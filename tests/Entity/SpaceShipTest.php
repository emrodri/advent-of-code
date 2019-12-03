<?php

namespace Tests\AdventOfCode;

use TDDIntro\Domain\Entity\Computer;
use TDDIntro\Domain\Entity\IntCodeProgram;
use TDDIntro\Domain\Entity\Module;
use TDDIntro\Domain\Entity\SpaceShip;

class SpaceShipTest extends \PHPUnit\Framework\TestCase
{


  public function testFuelNeedIs2IfModuleMassIs14()
  {
    $module = Module::ofMass(14);
    $spaceShip = new SpaceShip([$module]);
    $this->assertEquals($spaceShip->fuelRequiredToLaunch(), 2);
  }

  public function testFuelNeedIs654IfModuleMassIs1969()
  {
    $module = Module::ofMass(1969);
    $spaceShip = new SpaceShip([$module]);
    $this->assertEquals($spaceShip->fuelRequiredToLaunch(), 966);
  }

  public function testFuelNeedIs33583IfModuleMassIs100756()
  {
    $module = Module::ofMass(100756);
    $spaceShip = new SpaceShip([$module]);
    $this->assertEquals($spaceShip->fuelRequiredToLaunch(), 50346);
  }

  public function testFuelNeededInPuzzleTest()
  {
    $inputs = file(dirname(__FILE__) . "/Files/inputs.txt");
    $modules = [];
    foreach ($inputs as $mass) {
      $modules[] = Module::ofMass(intval($mass));
    }
    $spaceShip = new SpaceShip($modules);
    $this->assertEquals($spaceShip->fuelRequiredToLaunch(), 4900568);
  }
}