<?php

namespace Tests\AdventOfCode;
use AdventOfCode\Domain\Entity\Module;
use AdventOfCode\Domain\Entity\ModuleHasNotMassException;
use AdventOfCode\Domain\Entity\SpaceShip;

class ModuleTest extends \PHPUnit\Framework\TestCase
{
  public function testCreateModuleShouldHaveMass(){
    $module = Module::ofMass(1);
    $this->assertEquals($module->mass(), 1);
  }

  public function testCreatedModuleShouldHaveFuelNeeded(){
    $module = Module::ofMass(12);
    $this->assertEquals($module->fuelNeeded(), 2);
  }
  public function testCreateModuleWithMass0ShouldRaiseException(){
    $this->expectException(ModuleHasNotMassException::class);
    Module::ofMass(0);
  }
}