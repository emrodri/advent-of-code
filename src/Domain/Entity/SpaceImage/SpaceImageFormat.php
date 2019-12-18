<?php


namespace AdventOfCode\Domain\Entity\SpaceImage;


class SpaceImageFormat
{
  private $data;
  private $height;
  private $width;
  private $layers;

  public function __construct($data, $height, $width)
  {
    $this->data = $data;
    $this->height = $height;
    $this->width = $width;
    $layers_strings = str_split($data, $height * $width);
    foreach ($layers_strings as $layerData) {
      $this->layers[] = SpaceImageLayer::fromData($layerData, $width);
    }
  }

  public static function create(string $data, int $height, int $width)
  {
    return new self($data, $height, $width);
  }

  public function layers(){
    return $this->layers;
  }
}