<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Computer;
use AdventOfCode\Domain\Entity\IntCodeProgram;
use AdventOfCode\Domain\Entity\Module;
use AdventOfCode\Domain\Entity\SpaceShip;

class ComputerTest extends \PHPUnit\Framework\TestCase
{


  public function testLaunchIntCode1()
  {
    $memory = "2,3,0,3,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode2()
  {
    $computer = Computer::createFromMemoryString("2,3,0,3,99");
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode3()
  {
    $memory = "1,9,10,3,2,3,11,0,99,30,40,50";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals("3500", $computer->runIntCodeProgram());
  }

  public function testLaunchIntCode4()
  {
    $computer = Computer::createFromMemoryString("2,4,4,5,99,0");
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode5()
  {
    $computer = Computer::createFromMemoryString("1,1,1,4,99,5,6,0,99");
    $this->assertEquals($computer->runIntCodeProgram(), "30");
  }
}