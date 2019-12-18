<?php


namespace Entity;


use AdventOfCode\Domain\Entity\SpaceImage\SpaceImageFormat;
use PHPUnit\Framework\TestCase;

class SpaceImageTest extends TestCase
{
  public function testCreateImage()
  {
    $data = "123456";
    $height = 1;
    $width = 2;
    $image = SpaceImageFormat::create($data, $height, $width);
    $this->assertEquals(SpaceImageFormat::class, get_class($image));
  }

  public function testImageHasLayers()
  {
    $data = "123456789012";
    $height = 2;
    $width = 3;
    $image = SpaceImageFormat::create($data, $height, $width);
    $this->assertEquals(2, count($image->layers()));
  }

  public function testImageLayersHasItems()
  {
    $data = "123456789012";
    $height = 2;
    $width = 3;
    $image = SpaceImageFormat::create($data, $height, $width);
    $this->assertEquals(2, count($image->layers()[0]));
    $this->assertEquals(2, count($image->layers()[1]));
  }
}