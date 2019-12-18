<?php

namespace AdventOfCode\Domain\Entity\Programs;

final class AmplifierControllerSoftware extends IntCodeProgram
{
  private $memoryPosition;

  public function run()
  {

    $this->outputs = [];
    $this->instructionPointer = ($this->memoryPosition == null) ? 0 : $this->memoryPosition;

    $this->nextInstructionFromMemory();
    while (!$this->instruction->isFinishInstruction()) {
      $input = $this->getInputForNextInstruction();
      $instructionOutput = $this->instruction->runIn($this->memory, $input);
      if ($instructionOutput !== null) {
        $this->outputs[] = $instructionOutput;
        $this->memoryPosition = $this->instructionPointer;
        return null;
      }
      $this->nextInstructionFromMemory();
    }
  }

  private function getInputForNextInstruction()
  {
    $input = null;
    if ($this->instruction->needInput()) {
      $input = array_shift($this->inputs);
    }
    return $input;
  }

  public function output()
  {
    return array_pop($this->outputs);
  }
}