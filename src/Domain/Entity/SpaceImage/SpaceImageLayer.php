<?php


namespace AdventOfCode\Domain\Entity\SpaceImage;


class SpaceImageLayer
{
  private $lines;


  public function __construct(string $data, int $width)
  {
    $this->lines = str_split($data, $width);
  }

  public static function fromData(string $data, int $width)
  {
    return new self($data, $width);
  }

  public function layers()
  {
  }
}