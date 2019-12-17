<?php


namespace AdventOfCode\Domain\Entity\Instructions;


class IntCodeInstructionFinish extends IntCodeInstruction
{
  const MEMORY_SIZE = 1;

  public function runIn(array &$memory, $input = null)
  {
    return null;
  }

  function isFinishInstruction(): bool
  {
    return true;
  }

}