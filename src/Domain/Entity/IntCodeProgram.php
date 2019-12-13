<?php

namespace AdventOfCode\Domain\Entity;

use Exception;

abstract class IntCodeProgram
{
  const RESULT_POSITION = 0;
  const INITIAL_POSITION = 0;

  protected $memory;
  protected $instructionPointer = self::INITIAL_POSITION;
  /** @var IntCodeInstruction $instruction */
  protected $instruction = null;
  protected $inputs;
  protected $outputs;


  protected function __construct(array $memoryState)
  {
    $this->memory = $memoryState;
    $this->inputs = [];
    $this->outputs = [];
  }

  public static function fromMemoryState(array $memoryState)
  {
    return new static($memoryState);
  }

  public function run(){}

  public function setInput($input)
  {
    $this->inputs[] = $input;
  }

  /**
   * @throws Exception
   */
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

  protected function nextInstructionFromMemory()
  {
    $this->instructionPointer = ($this->instruction) ? $this->instruction->nextInstructionPointer($this->instructionPointer) : 0;
    $this->instruction = IntCodeInstructionFactory::fromMemory($this->memory, $this->instructionPointer);
  }
}