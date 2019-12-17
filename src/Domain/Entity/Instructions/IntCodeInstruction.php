<?php

namespace AdventOfCode\Domain\Entity\Instructions;

abstract class IntCodeInstruction
{
  abstract function runIn(array &$memory, $input);

  abstract function isFinishInstruction(): bool;

  public function needInput(){
    return false;
  }

  public function nextInstructionPointer($actualPointer)
  {
    return $actualPointer + static::MEMORY_SIZE;
  }


}