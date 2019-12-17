<?php


namespace AdventOfCode\Domain\Entity\Instructions;


class IntCodeInstructionJumpIfTrue extends IntCodeInstruction
{
  const MEMORY_SIZE = 3;
  private $firstOperator;
  private $secondOperator;
  private $nextInstructionPointer = null;

  public function __construct($firstOperator, $secondOperator)
  {
    $this->firstOperator = $firstOperator;
    $this->secondOperator = $secondOperator;
  }

  function runIn(array &$memory, $input = null)
  {
    if (intval($this->firstOperator) !== 0) {
      $this->nextInstructionPointer = $this->secondOperator;
    }
  }

  function isFinishInstruction(): bool
  {
    return false;
  }


  public function nextInstructionPointer($actualPointer)
  {
    return ($this->nextInstructionPointer) ? $this->nextInstructionPointer : $actualPointer + self::MEMORY_SIZE;
  }
}