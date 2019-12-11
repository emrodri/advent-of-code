<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionLessThan extends IntCodeInstruction
{
  const MEMORY_SIZE = 4;
  private $firstOperator;
  private $secondOperator;
  private $resultAddress;


  public function __construct(string $firstOperator, string $secondOperator, string $resultAddress)
  {
    $this->firstOperator = $firstOperator;
    $this->secondOperator = $secondOperator;
    $this->resultAddress = $resultAddress;
  }

  function runIn(array &$memory, int $input)
  {
    $memory[$this->resultAddress] = (intval($this->firstOperator) < intval($this->secondOperator)) ? 1 : 0;
  }

  function isFinishInstruction(): bool
  {
    return false;
  }
}