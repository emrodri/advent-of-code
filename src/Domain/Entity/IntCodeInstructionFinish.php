<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionFinish extends IntCodeInstruction
{
  public function runIn(array &$memory): array
  {
    return null;
  }

  function isFinishInstruction(): bool
  {
    return true;
  }

}