<?php

namespace AdventOfCode\Domain\Entity;

final class GravityAssistProgram extends IntCodeProgram
{
  public function run()
  {
    $this->nextInstructionFromMemory();
    while (!$this->instruction->isFinishInstruction()) {
      $this->instruction->runIn($this->memory, null);
      $this->nextInstructionFromMemory();
    }
    return $this->memory[self::RESULT_POSITION];
  }
}