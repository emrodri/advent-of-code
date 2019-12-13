<?php


namespace AdventOfCode\Domain\Entity;


class Planet
{
  private $name;



  private $orbitsPlanet;

  private function __construct($name)
  {
    $this->name = $name;
    $this->orbitsPlanet = null;
  }

  public static function create(string $name)
  {
    return new self($name);
  }

  public function orbitsTo($planet)
  {
    $this->orbitsPlanet = $planet;
  }

  public function name()
  {
    return $this->name;
  }

  public function orbitsPlanet()
  {
    return $this->orbitsPlanet;
  }

}