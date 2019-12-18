<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Amplifier;
use AdventOfCode\Domain\Entity\Computer;
use AdventOfCode\Domain\Entity\Programs\AmplifierControllerSoftware;
use PHPUnit\Framework\TestCase;

class IntCodeAmplifierTest extends TestCase
{


  public function testLaunchTestIntCode1()
  {
    $memory = "3,15,3,16,1002,16,10,16,1,16,15,15,4,15,99,0,0";
    $memoryState = explode(',', $memory);
    $ampOutput1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 4)->run(0);
    $ampOutput2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 3)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 2)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 1)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 0)->run($ampOutput4);
    $this->assertEquals('43210', $ampOutput5);
  }

  public function testLaunchTestIntCode2()
  {
    $memory = "3,23,3,24,1002,24,10,24,1002,23,-1,23,101,5,23,23,1,24,23,23,4,23,99,0,0";
    $memoryState = explode(',', $memory);
    $ampOutput1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 0)->run(0);
    $ampOutput2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 1)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 2)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 3)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 4)->run($ampOutput4);
    $this->assertEquals('54321', $ampOutput5);
  }

  public function testLaunchTestIntCode3()
  {
    $memory = "3,31,3,32,1002,32,10,32,1001,31,-2,31,1007,31,0,33,1002,33,7,33,1,33,31,31,1,32,31,31,4,31,99,0,0,0";
    $memoryState = explode(',', $memory);
    $ampOutput1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 1)->run(0);
    $ampOutput2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 0)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 4)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 3)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 2)->run($ampOutput4);
    $this->assertEquals('65210', $ampOutput5);
  }

  public function testLaunchTestIntCode5()
  {
    $memory = "3,26,1001,26,-4,26,3,27,1002,27,2,27,1,27,26,27,4,27,1001,28,-1,28,1005,28,6,99,0,0,5";
    $memoryState = explode(',', $memory);
    $lastSignal = $signal = 0;
    $amp1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 9);
    $amp2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 8);
    $amp3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 7);
    $amp4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 6);
    $amp5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 5);
    while ($signal !== null) {
      $signal = $amp1->run($signal);
      $signal = $amp2->run($signal);
      $signal = $amp3->run($signal);
      $signal = $amp4->run($signal);
      $signal = $amp5->run($signal);
      if ($signal !== null) {
        $lastSignal = $signal;
      }
    }
    $this->assertEquals(139629729, $lastSignal);
  }

  public function testLaunchTestIntCode6()
  {
    $memory = "3,52,1001,52,-5,52,3,53,1,52,56,54,1007,54,5,55,1005,55,26,1001,54,-5,54,1105,1,12,1,53,54,53,1008,54,0,55,1001,55,1,55,2,53,55,53,4,53,1001,56,-1,56,1005,56,6,99,0,0,0,0,10";
    $memoryState = explode(',', $memory);
    $lastSignal = $signal = 0;
    $amp1 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 9);
    $amp2 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 7);
    $amp3 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 8);
    $amp4 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 5);
    $amp5 = Amplifier::installOnShip(AmplifierControllerSoftware::fromMemoryState($memoryState), 6);
    while ($signal !== null) {
      $signal = $amp1->run($signal);
      $signal = $amp2->run($signal);
      $signal = $amp3->run($signal);
      $signal = $amp4->run($signal);
      $signal = $amp5->run($signal);
      if ($signal !== null) {
        $lastSignal = $signal;
      }
    }
    $this->assertEquals(18216, $lastSignal);
  }


}