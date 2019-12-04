<?php

namespace AdventOfCode\Domain\Entity;


class Wire
{
  private $directions = [
      'U' => [0, 1],
      'D' => [0, -1],
      'L' => [-1, 0],
      'R' => [1, 0],
  ];

  private $sections;

  private function __construct(array $sections)
  {

    $this->sections = $sections;
  }

  public static function fromString($input)
  {
    $sections = explode(",", $input);
    return new self($sections);
  }

  public function trace()
  {
    $position = [0, 0];
    $steps=0;
    $wire_grid['0,0'] = 0;
    foreach ($this->sections as $path) {
      $direction = $path[0];
      $distance = intval(substr($path, 1));
      for ($i = 1; $i <= $distance; $i++) {
        $position[0] += $this->directions[$direction][0];
        $position[1] += $this->directions[$direction][1];
        $wire_grid["{$position[0]}, {$position[1]}"] = ++$steps;
      }
    }
    return $wire_grid;
  }


}