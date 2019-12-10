<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Computer;
use AdventOfCode\Domain\Entity\IntCodeProgram;
use AdventOfCode\Domain\Entity\Module;
use AdventOfCode\Domain\Entity\SpaceShip;

class IntCodeTestProgramTest extends \PHPUnit\Framework\TestCase
{


  public function testLaunchTestIntCode1()
  {
    $memory = "3,0,4,0,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(2, $computer->runTestProgram(2));
  }

  public function testLaunchTestIntCode2()
  {
    $memory = "1002,4,3,4,33";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(null, $computer->runTestProgram(1));
  }

  public function testLaunchTestIntCode3()
  {
    $memory = "1101,100,-1,4,0";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(null, $computer->runTestProgram(1));
  }
}