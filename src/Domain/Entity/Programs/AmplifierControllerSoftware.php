<?php

namespace AdventOfCode\Domain\Entity\Programs;

final class AmplifierControllerSoftware extends IntCodeProgram
{
  public function run()
  {
    $this->outputs = [];
    $this->nextInstructionFromMemory();
    while (!$this->instruction->isFinishInstruction()) {
      $input = $this->getInputForNextInstruction();
      $instructionOutput = $this->instruction->runIn($this->memory, $input);
      if ($instructionOutput !== null) {
        $this->outputs[] = $instructionOutput;
      }
      $this->nextInstructionFromMemory();
    }
    return $this->memory[self::RESULT_POSITION];
  }

  private function getInputForNextInstruction()
  {
    $input = null;
    if ($this->instruction->needInput()) {
      $input = array_shift($this->inputs);
    }
    return $input;
  }
}