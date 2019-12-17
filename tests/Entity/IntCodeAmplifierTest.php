<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Amplifier;
use AdventOfCode\Domain\Entity\Computer;
use PHPUnit\Framework\TestCase;

class IntCodeAmplifierTest extends TestCase
{


  public function testLaunchTestIntCode1()
  {
    $memory = "3,15,3,16,1002,16,10,16,1,16,15,15,4,15,99,0,0";
    $computer = Computer::createFromMemoryString($memory);

    $ampOutput1 = Amplifier::installOn($computer, 4)->run(0);
    $ampOutput2 = Amplifier::installOn($computer, 3)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOn($computer, 2)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOn($computer, 1)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOn($computer, 0)->run($ampOutput4);
    $this->assertEquals('43210', $ampOutput5);
  }

  public function testLaunchTestIntCode2()
  {
    $memory = "3,23,3,24,1002,24,10,24,1002,23,-1,23,101,5,23,23,1,24,23,23,4,23,99,0,0";
    $computer = Computer::createFromMemoryString($memory);
    $ampOutput1 = Amplifier::installOn($computer, 0)->run(0);
    $ampOutput2 = Amplifier::installOn($computer, 1)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOn($computer, 2)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOn($computer, 3)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOn($computer, 4)->run($ampOutput4);
    $this->assertEquals('54321', $ampOutput5);
  }

  public function testLaunchTestIntCode3()
  {
    $memory = "3,31,3,32,1002,32,10,32,1001,31,-2,31,1007,31,0,33,1002,33,7,33,1,33,31,31,1,32,31,31,4,31,99,0,0,0";
    $computer = Computer::createFromMemoryString($memory);

    $ampOutput1 = Amplifier::installOn($computer, 1)->run(0);
    $ampOutput2 = Amplifier::installOn($computer, 0)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOn($computer, 4)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOn($computer, 3)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOn($computer, 2)->run($ampOutput4);
    $this->assertEquals('65210', $ampOutput5);
  }


  public function testLaunchTestIntCode4()
  {
    $memory = "3,31,3,32,1002,32,10,32,1001,31,-2,31,1007,31,0,33,1002,33,7,33,1,33,31,31,1,32,31,31,4,31,99,0,0,0";
    $computer = Computer::createFromMemoryString($memory);

    $ampOutput1 = Amplifier::installOn($computer, 1)->run(0);
    $ampOutput2 = Amplifier::installOn($computer, 0)->run($ampOutput1);
    $ampOutput3 = Amplifier::installOn($computer, 4)->run($ampOutput2);
    $ampOutput4 = Amplifier::installOn($computer, 3)->run($ampOutput3);
    $ampOutput5 = Amplifier::installOn($computer, 2)->run($ampOutput4);
    $this->assertEquals('65210', $ampOutput5);
  }



}