<?php

namespace AdventOfCode\Domain\Entity;

use Exception;

final class IntCodeProgram
{
  const RESULT_POSITION = 0;
  const INITIAL_POSITION = 0;

  private $memory;
  private $instructionPointer = self::INITIAL_POSITION;
  /** @var IntCodeInstruction $instruction */
  private $instruction = null;
  private $input;
  private $outputs;


  public function __construct(array $memoryState)
  {
    $this->memory = $memoryState;
    $this->input = null;
    $this->outputs = [];
  }

  public static function fromMemoryState(array $memoryState)
  {
    return new self($memoryState);
  }

  public function run()
  {
    $this->outputs = [];
    $this->nextInstructionFromMemory();
    while (!$this->instruction->isFinishInstruction()) {
      $instructionOutput = $this->instruction->runIn($this->memory, $this->input);
      if ($instructionOutput !== null) {
        $this->outputs[] = $instructionOutput;
      }
      $this->nextInstructionFromMemory();
    }
    $this->setInput(null);
    return $this->memory[self::RESULT_POSITION];
  }

  public function setInput($input)
  {
    $this->input = $input;
  }

  public function output()
  {
    $diagnosticCode = array_pop($this->outputs);
    foreach ($this->outputs as $output) {
      if ($output > 0) {
        throw new Exception("Error en Debug Code");
      }
    }
    return $diagnosticCode;
  }

  private function nextInstructionFromMemory()
  {
    $this->instructionPointer = ($this->instruction) ? $this->instruction->nextInstructionPointer($this->instructionPointer) : 0;
    $this->instruction = IntCodeInstructionFactory::fromMemory($this->memory, $this->instructionPointer);
  }
}