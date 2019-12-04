<?php

namespace AdventOfCode\Domain\Entity;

final class IntCodeProgram
{
  const INSTRUCTION_LENGTH = 4;
  const RESULT_POSITION = 0;
  const INITIAL_POSITION = 0;

  private $memory;
  private $instructionPointer = self::INITIAL_POSITION;

  public function __construct(array $memoryState)
  {
    $this->memory = $memoryState;
  }

  public static function fromMemoryState(array $memoryState)
  {
    return new self($memoryState);
  }

  public function run()
  {
    $instruction = $this->nextInstructionFromMemory();
    while (!$instruction->isFinishInstruction()) {
      $instruction->runIn($this->memory);
      $instruction = $this->nextInstructionFromMemory();
    }
    return $this->memory[self::RESULT_POSITION];
  }

  private function nextInstructionFromMemory()
  {
    $instructionMemory = array_slice($this->memory, $this->instructionPointer, self::INSTRUCTION_LENGTH);
    $this->instructionPointer += self::INSTRUCTION_LENGTH;
    return IntCodeInstructionFactory::fromMemory($instructionMemory);
  }
}