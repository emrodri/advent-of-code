<?php


namespace AdventOfCode\Domain\Entity;


class FuelManagement
{
  /** @var Wire[] */
  private $wires;

  private function __construct($wires = [])
  {
    $this->wires = $wires;
  }

  public static function create()
  {
    return new self();
  }

  public function addWire(Wire $wire)
  {
    $this->wires[] = $wire;
  }

  public function wires(): array
  {
    return $this->wires;
  }

  public function findNearestIntersections()
  {
    $wire1 = $this->wires[0]->trace();
    $wire2 = $this->wires[1]->trace();
    $intersects = array_intersect_key($wire1, $wire2);
    $distances = [];
    foreach ($intersects as $intersect => $steps) {
      list($x, $y) = explode(',', $intersect);
      $distance = abs($x) + abs($y);
      if ($distance != 0) {
        $distances[] = $distance;
      }
    }
    return min($distances);
  }

  public function findFasterIntersections()
  {
    $wire1 = $this->wires[0]->trace();
    $wire2 = $this->wires[1]->trace();
    $intersects = array_intersect_key($wire1, $wire2);
    $totalSteps = [];
    foreach ($intersects as $intersect => $steps) {
      if ($intersect != '0,0') {
        $totalSteps[] = $wire1[$intersect] + $wire2[$intersect];
      }
    }
    return min($totalSteps);
  }
}