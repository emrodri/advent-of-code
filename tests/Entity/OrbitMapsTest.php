<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\PlanetsMap;
use PHPUnit\Framework\TestCase;

class OrbitMapsTest extends TestCase
{

  const INPUT_ORBITS = "COM)B
                        B)C
                        C)D
                        D)E
                        E)F
                        B)G
                        G)H
                        D)I
                        E)J
                        J)K
                        K)L";
  const INPUT_ORBITS2 = "COM)B
B)C
C)D
D)E
E)F
B)G
G)H
D)I
E)J
J)K
K)L
K)YOU
I)SAN";
  public function testCreateOrbitsMapReturnsOrbitsMap()
  {
    $input = self::INPUT_ORBITS;
    $orbitsMap = PlanetsMap::createFromStringMap($input);
    $this->assertEquals(get_class($orbitsMap), PlanetsMap::class);
  }

  public function testCreateOrbitsMapWithNumberOfStringsReturnOrbitMapWithSameNumberOfOrbits()
  {
    $input = self::INPUT_ORBITS;
    $orbitsMap = PlanetsMap::createFromStringMap($input);
    $this->assertEquals(11, count($orbitsMap->planets()));
  }

  public function testTotalOrbitsToCOM()
  {
    $input = "COM)B
    B)C";
    $orbitsMap = PlanetsMap::createFromStringMap($input);
    $this->assertEquals(3, $orbitsMap->totalOrbitsInPlanetMap());
  }

  public function testTotalOrbitsToCOM2()
  {
    $input = self::INPUT_ORBITS;
    $orbitsMap = PlanetsMap::createFromStringMap($input);
    $this->assertEquals(42, $orbitsMap->totalOrbitsInPlanetMap());
  }

  public function testNumberOfJumps()
  {
    $input = self::INPUT_ORBITS2;
    $orbitsMap = PlanetsMap::createFromStringMap($input);
    $this->assertEquals(4, $orbitsMap->numberOfJumpsForTravel("YOU", "SAN"));
  }

}