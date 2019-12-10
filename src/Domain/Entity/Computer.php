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

  public function runIntCodeProgram()
  {
    return IntCodeProgram::fromMemoryState($this->memory)->run();
  }

  public function runIntCodeProgramWithInputs(int $noun, int $verb)
  {
    $program = $this->memory;
    $program[1] = $noun;
    $program[2] = $verb;
    return IntCodeProgram::fromMemoryState($program)->run();
  }

  public function runTestProgram($input)
  {
    $program = IntCodeProgram::fromMemoryState($this->memory);
    $program->setInput($input);
    $program->run();
    return $program->output();
  }
}