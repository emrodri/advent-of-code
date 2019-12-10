<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionFinish extends IntCodeInstruction
{
  const MEMORY_SIZE = 1;

  public function runIn(array &$memory)
  {
    return null;
  }

  function isFinishInstruction(): bool
  {
    return true;
  }

  function memorySize(): int
  {
    return self::MEMORY_SIZE;
  }
}