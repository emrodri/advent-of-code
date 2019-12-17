<?php


namespace AdventOfCode\Domain\Entity;

use AdventOfCode\Domain\Entity\Programs\AmplifierControllerSoftware;
use AdventOfCode\Domain\Entity\Programs\GravityAssistSoftware;
use AdventOfCode\Domain\Entity\Programs\TestDiagnosticSoftware;
use Exception;

final class Computer
{
  private $memory;

  public function __construct(array $memory = [])
  {
    $this->memory = $memory;
  }

  public static function createFromMemoryString($memoryString)
  {
    $memory = explode(',', $memoryString);
    return new self($memory);
  }

  public function runGravityAssistProgram()
  {
    return GravityAssistSoftware::fromMemoryState($this->memory)->run();
  }

  public function runTestProgram($input)
  {
    $program = TestDiagnosticSoftware::fromMemoryState($this->memory);
    $program->setInput($input);
    $program->run();
    return $program->output();
  }

  public function runProgramAlarm(int $noun, int $verb)
  {
    $program = $this->memory;
    $program[0]=$noun;
    $program[1]=$verb;
    return GravityAssistSoftware::fromMemoryState($program)->run();
  }


  public function runAmplifierProgram(array $input)
  {
    $program = AmplifierControllerSoftware::fromMemoryState($this->memory);
    $program->setInput($input[0]);
    $program->setInput($input[1]);
    $program->run();
    return $program->output();
  }

}