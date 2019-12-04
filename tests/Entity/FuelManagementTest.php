<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\FuelManagement;
use AdventOfCode\Domain\Entity\Wire;
use PHPUnit\Framework\TestCase;

class FuelManagementTest extends TestCase
{


  public function testAddWiresToFuelManagement()
  {
    $inputs = ["R8,U5,L5,D3", "U7,R6,D4,L4"];
    $fuelManagement = FuelManagement::create();
    foreach ($inputs as $input) {
      $fuelManagement->addWire(Wire::fromString($input));
    }
    $this->assertEquals(2, count($fuelManagement->wires()));
  }

  public function testTraceWireCreateGrid()
  {
    $wire1 = Wire::fromString("R8,U5,L5,D3");
    $wire2 = Wire::fromString("U7,R6,D4,L4");
    $fuelManagement = FuelManagement::create();
    $fuelManagement->addWire($wire1);
    $fuelManagement->addWire($wire2);
    $this->assertEquals(6, $fuelManagement->findNearestIntersections());

  }

  public function testTraceWireCreateGrid2()
  {
    $wire1 = Wire::fromString("R75,D30,R83,U83,L12,D49,R71,U7,L72");
    $wire2 = Wire::fromString("U62,R66,U55,R34,D71,R55,D58,R83");
    $fuelManagement = FuelManagement::create();
    $fuelManagement->addWire($wire1);
    $fuelManagement->addWire($wire2);
    $this->assertEquals(159, $fuelManagement->findNearestIntersections());
  }

  public function testTraceWireCreateGrid3()
  {
    $wire1 = Wire::fromString("R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51");
    $wire2 = Wire::fromString("U98,R91,D20,R16,D67,R40,U7,R15,U6,R7");
    $fuelManagement = FuelManagement::create();
    $fuelManagement->addWire($wire1);
    $fuelManagement->addWire($wire2);
    $this->assertEquals(135, $fuelManagement->findNearestIntersections());
  }

  public function testTraceWireCreateGrid4()
  {
    $wire1 = Wire::fromString("R75,D30,R83,U83,L12,D49,R71,U7,L72");
    $wire2 = Wire::fromString("U62,R66,U55,R34,D71,R55,D58,R83");
    $fuelManagement = FuelManagement::create();
    $fuelManagement->addWire($wire1);
    $fuelManagement->addWire($wire2);
    $this->assertEquals(610, $fuelManagement->findFasterIntersections());
  }

  public function testTraceWireCreateGrid5()
  {
    $wire1 = Wire::fromString("R98,U47,R26,D63,R33,U87,L62,D20,R33,U53,R51");
    $wire2 = Wire::fromString("U98,R91,D20,R16,D67,R40,U7,R15,U6,R7");
    $fuelManagement = FuelManagement::create();
    $fuelManagement->addWire($wire1);
    $fuelManagement->addWire($wire2);
    $this->assertEquals(410, $fuelManagement->findFasterIntersections());
  }

}