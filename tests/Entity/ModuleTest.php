<?php

namespace Tests\AdventOfCode;
use TDDIntro\Domain\Entity\Module;
use TDDIntro\Domain\Entity\ModuleHasNotMassException;
use TDDIntro\Domain\Entity\SpaceShip;

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