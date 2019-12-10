<?php

namespace AdventOfCode\Domain\Entity;

final class IntCodeProgram
{
  const RESULT_POSITION = 0;
  const INITIAL_POSITION = 0;

  private $memory;
  private $instructionPointer = self::INITIAL_POSITION;
  private $input;
  private $output;


  public function __construct(array $memoryState)
  {
    $this->memory = $memoryState;
    $this->input = null;
  }

  public static function fromMemoryState(array $memoryState)
  {
    return new self($memoryState);
  }

  public function run()
  {
    $instruction = $this->nextInstructionFromMemory();
    while (!$instruction->isFinishInstruction()) {
      $this->output = $instruction->runIn($this->memory, $this->input);
      $instruction = $this->nextInstructionFromMemory();
    }
    $this->setInput(null);
    return $this->memory[self::RESULT_POSITION];
  }

  public function setInput($input)
  {
    $this->input = $input;
  }

  public function output()
  {
    return $this->output;
  }

  private function nextInstructionFromMemory()
  {
    $instruction = IntCodeInstructionFactory::fromMemory($this->memory, $this->instructionPointer);
    $this->instructionPointer += $instruction->memorySize();
    return $instruction;
  }
}