<?php

namespace Tests\AdventOfCode;

use TDDIntro\Domain\Entity\Computer;
use TDDIntro\Domain\Entity\IntCodeProgram;
use TDDIntro\Domain\Entity\Module;
use TDDIntro\Domain\Entity\SpaceShip;

class ComputerTest extends \PHPUnit\Framework\TestCase
{


  public function testLaunchIntCode1()
  {
    $memory = "2,3,0,3,99";
    $computer = Computer::createFromMemory($memory);
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode2()
  {
    $computer = Computer::createFromMemory("2,3,0,3,99");
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode3()
  {
    $memory = "1,9,10,3,2,3,11,0,99,30,40,50";
    $computer = Computer::createFromMemory($memory);
    $this->assertEquals($computer->runIntCodeProgram(), "3500");
  }

  public function testLaunchIntCode4()
  {
    $computer = Computer::createFromMemory("2,4,4,5,99,0");
    $this->assertEquals($computer->runIntCodeProgram(), "2");
  }

  public function testLaunchIntCode5()
  {
    $computer = Computer::createFromMemory("1,1,1,4,99,5,6,0,99");
    $this->assertEquals($computer->runIntCodeProgram(), "30");
  }

  public function testLaunchIntCodeFile()
  {
    $inputs = file(dirname(__FILE__) . "/Files/inputs_day_2.txt");
    $instructions = implode(",", $inputs);
    $computer = Computer::createFromMemory($instructions);
    $this->assertEquals($computer->runIntCodeProgram(), "3058646");
  }
}