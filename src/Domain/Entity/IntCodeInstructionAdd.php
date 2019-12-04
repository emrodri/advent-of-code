<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionAdd extends IntCodeInstruction
{
  private $firstOperatorAddress;
  private $secondOperatorAddress;
  private $resultAddress;

  public function __construct(string $firstOperatorAddress, string $secondOperatorAddress, string $resultAddress)
  {
    $this->firstOperatorAddress = $firstOperatorAddress;
    $this->secondOperatorAddress = $secondOperatorAddress;
    $this->resultAddress = $resultAddress;
  }

  function runIn(array &$memory): array
  {
    $memory[$this->resultAddress] = $memory[$this->firstOperatorAddress] + $memory[$this->secondOperatorAddress];
    return $memory;
  }

  function isFinishInstruction(): bool
  {
    return false;
  }
}