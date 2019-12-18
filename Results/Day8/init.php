<?php


use AdventOfCode\Domain\Entity\SpaceImage\SpaceImageFormat;

require __DIR__ . '/../config.php';
$data = file_get_contents(dirname(__FILE__) . "/input.txt");
$height = 6;
$width = 25;

$image = SpaceImageFormat::create($data, $height, $width);
$layerWithMaxZero = ['layer ' => null, 'zeros_count' => 0];
foreach ($image->layers() as $layer) {
  $zeros_count = 0;
  foreach ($layer as $layer_line) {
    $zeros_count += substr_count($layer_line, '0');
  }
  if ($zeros_count < $layerWithMaxZero['zeros_count'] || $layerWithMaxZero['zeros_count'] == 0) {
    $layerWithMaxZero["layer"] = $layer;
    $layerWithMaxZero["zeros_count"] = $zeros_count;
  }
}
$num_ones = 0;
$num_twos = 0;
foreach ($layerWithMaxZero['layer'] as $layer_line) {
  $num_ones += substr_count($layer_line, '1');
  $num_twos += substr_count($layer_line, '2');
}
echo "Number of 1 digits ($num_ones) multiplied by the number of 2 digits ($num_twos) => " . $num_ones * $num_twos . PHP_EOL;