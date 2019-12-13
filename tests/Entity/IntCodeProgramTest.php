<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Computer;
use AdventOfCode\Domain\Entity\IntCodeProgram;
use AdventOfCode\Domain\Entity\Module;
use AdventOfCode\Domain\Entity\SpaceShip;
use PHPUnit\Framework\TestCase;

class IntCodeProgramTest extends TestCase
{


  public function testLaunchIntCode1()
  {
    $memory = "1,0,0,0,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals($computer->runGravityAssistProgram(), "2");
  }

  public function testLaunchIntCode2()
  {
    $memory = "2,3,0,3,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals($computer->runGravityAssistProgram(), "2");
  }

  public function testLaunchIntCode3()
  {
    $memory = "1,9,10,3,2,3,11,0,99,30,40,50";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals("3500", $computer->runGravityAssistProgram());
  }

  public function testLaunchIntCode4()
  {
    $memory = "2,4,4,5,99,0";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals($computer->runGravityAssistProgram(), "2");
  }

  public function testLaunchIntCode5()
  {
    $memory = "1,1,1,4,99,5,6,0,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals($computer->runGravityAssistProgram(), "30");
  }

}