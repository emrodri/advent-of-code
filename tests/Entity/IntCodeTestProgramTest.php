<?php

namespace Tests\AdventOfCode;

use AdventOfCode\Domain\Entity\Computer;
use PHPUnit\Framework\TestCase;

class IntCodeTestProgramTest extends TestCase
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

  public function testLaunchTestIntCode4()
  {
    $memory = "3,9,8,9,10,9,4,9,99,-1,8";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(0, $computer->runTestProgram(1));
    $this->assertEquals(1, $computer->runTestProgram(8));
  }

  public function testLaunchTestIntCode5()
  {
    $memory = "3,9,7,9,10,9,4,9,99,-1,8";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(1, $computer->runTestProgram(7));
    $this->assertEquals(0, $computer->runTestProgram(8));
  }

  public function testLaunchTestIntCode6()
  {
    $memory = "3,3,1108,-1,8,3,4,3,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(1, $computer->runTestProgram(8));
    $this->assertEquals(0, $computer->runTestProgram(1));
  }

  public function testLaunchTestIntCode7()
  {
    $memory = "3,3,1107,-1,8,3,4,3,99";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(1, $computer->runTestProgram(7));
    $this->assertEquals(0, $computer->runTestProgram(9));
  }

  public function testLaunchTestIntCode8()
  {
    $memory = "3,12,6,12,15,1,13,14,13,4,13,99,-1,0,1,9";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(0, $computer->runTestProgram(0));
    $this->assertEquals(1, $computer->runTestProgram(1));
  }

  public function testLaunchTestIntCode9()
  {
    $memory = "3,3,1105,-1,9,1101,0,0,12,4,12,99,1";
    $computer = Computer::createFromMemoryString($memory);
    $this->assertEquals(0, $computer->runTestProgram(0));
    $this->assertEquals(1, $computer->runTestProgram(1));
  }

  public function testLaunchTestIntCode10()
  {
    $memory = "3,21,1008,21,8,20,1005,20,22,107,8,21,20,1006,20,31,1106,0,36,98,0,0,1002,21,125,20,4,20,1105,1,46,104,999,1105,1,46,1101,1000,1,20,4,20,1105,1,46,98,99";
    $computer = Computer::createFromMemoryString($memory);
    // $this->assertEquals(999, $computer->runTestProgram(7));
    // $this->assertEquals(1000, $computer->runTestProgram(8));
    $this->assertEquals(1001, $computer->runTestProgram(9));
  }


}