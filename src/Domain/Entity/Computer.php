<?php


namespace AdventOfCode\Domain\Entity;

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
    return GravityAssistProgram::fromMemoryState($this->memory)->run();
  }

  public function runTestProgram($input)
  {
    $program = TestDiagnosticProgram::fromMemoryState($this->memory);
    $program->setInput($input);
    $program->run();
    return $program->output();
  }
}