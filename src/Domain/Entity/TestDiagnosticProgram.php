<?php

namespace AdventOfCode\Domain\Entity;

final class TestDiagnosticProgram extends IntCodeProgram
{
  public function run()
  {
    $this->outputs = [];
    $this->nextInstructionFromMemory();
    $input = $this->inputs[0];
    while (!$this->instruction->isFinishInstruction()) {
      $instructionOutput = $this->instruction->runIn($this->memory, $input);
      if ($instructionOutput !== null) {
        $this->outputs[] = $instructionOutput;
      }
      $this->nextInstructionFromMemory();
    }
    $this->setInput(null);
    return $this->memory[self::RESULT_POSITION];
  }
}