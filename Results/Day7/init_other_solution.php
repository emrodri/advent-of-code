<?php

require_once __DIR__ . '/utils.php';
// $input = trim(file_get_contents(__DIR__ . '/input.txt'));
//        0 1  2    3  4  5  6 7  8    9  1011 1213 14 15 1617 18   19 20 21 22   23 2425 262728
$input = "3,26,1001,26,-4,26,3,27,1002,27,2,27,1,27,26,27,4,27,1001,28,-1,28,1005,28,6,99,0,0,5";
$input = explode(',', $input);
$start = microtime(true);

$part2 = 0;

  $phase = [9, 8, 7, 6, 5];
  $amps = [];
  $signal = 0;
  for ($i = 0; $i < 5; $i++) {
    $amps[$i] = new IntCodeParser($input, $phase[$i]);
  }
  while (true) {
    for ($i = 0; $i < 5; $i++) {
      $amps[$i]->input($signal);

      echo "PROGRAM AMP$i => ". implode(',',$amps[$i]->program).PHP_EOL;
      echo "INPUTS AMP$i => ". implode(',',$amps[$i]->input).PHP_EOL;
      $output = $amps[$i]->output();
      if ($output === null) {
        if ($signal > $part2) $part2 = $signal;
        break 2;
      }
      echo "PROGRAM AMP$i => ". implode(',',$amps[$i]->program).PHP_EOL;
      echo "OUTPUT AMP$i => ". $output.PHP_EOL;
      $signal = $output;
    }
}
echo 'Part 2: ' . $part2 . PHP_EOL;
echo 'Finished in ' . (microtime(true) - $start) . PHP_EOL;