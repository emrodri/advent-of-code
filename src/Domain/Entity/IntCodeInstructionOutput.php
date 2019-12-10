<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionOutput extends IntCodeInstruction
{
  const MEMORY_SIZE = 2;

  private $output;


  public function __construct(string $output)
  {
    $this->output = $output;
  }

  function runIn(array &$memory)
  {
    return $this->output;
  }

  function isFinishInstruction(): bool
  {
    return false;
  }

  function memorySize(): int
  {
    return self::MEMORY_SIZE;
  }
}