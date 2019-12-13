<?php

namespace AdventOfCode\Domain\Entity;

class PlanetsMap
{
  /** @var Planet[] */
  private $planets;

  private function __construct(array $planets)
  {
    $this->planets = $planets;
  }

  public static function createFromStringMap($input)
  {
    $planets = [];
    $planets_array = explode(PHP_EOL, $input);
    foreach ($planets_array as $planets_item) {
      list($orbitsPlanet, $name) = explode(')', trim($planets_item));
      $planet = Planet::create($name);
      $planet->orbitsTo($orbitsPlanet);
      $planets[$name] = $planet;
    }
    return new self($planets);
  }

  public function planets(): array
  {
    return $this->planets;
  }

  public function findByName($name)
  {
    return $this->planets[$name];
  }

  public function totalOrbitsInPlanetMap()
  {
    $total = 0;
    foreach ($this->planets as $planet) {
      $planetsInPath = $this->pathToPlanet($planet->name(), "COM");
      $total += count($planetsInPath);
    }
    return $total;
  }

  public function numberOfJumpsForTravel($origin, $dest)
  {
    $pathOrigin = $this->pathToPlanet($origin, "COM");
    $pathDest = $this->pathToPlanet($dest, "COM");
    $intersect = $this->intersectOfPaths($pathOrigin, $pathDest);
    $travelOriginToIntersect = count($this->pathToPlanet($origin, $intersect)) - 1;
    $travelDestToIntersect = count($this->pathToPlanet($dest, $intersect)) - 1;
    return $travelOriginToIntersect + $travelDestToIntersect;
  }

  private function intersectOfPaths($pathDest, $pathOrigin)
  {
    $intersects = array_intersect($pathDest, $pathOrigin);
    return array_shift($intersects);
  }

  private function pathToPlanet($orig, $dest)
  {
    $from = $this->findByName($orig);
    $planets[] = $from->name();
    while ($from->orbitsPlanet() != $dest) {
      $from = $this->findByName($from->orbitsPlanet());
      $planets[] = $from->name();
    }
    return ($planets);
  }
}