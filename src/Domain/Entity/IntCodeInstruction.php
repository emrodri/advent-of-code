<?php

namespace AdventOfCode\Domain\Entity;

abstract class IntCodeInstruction
{
  abstract function runIn(array &$memory, int $input);

  abstract function isFinishInstruction(): bool;

  public function nextInstructionPointer($actualPointer)
  {
    return $actualPointer + static::MEMORY_SIZE;
  }
}