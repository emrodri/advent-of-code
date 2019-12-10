<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionStore extends IntCodeInstruction
{
  const MEMORY_SIZE = 2;

  private $resultAddress;


  public function __construct(string $resultAddress)
  {
    $this->resultAddress = $resultAddress;
  }

  function runIn(array &$memory, $input = null)
  {
    $memory[$this->resultAddress] = $input;
    return null;
  }

  function isFinishInstruction(): bool
  {
    return false;
  }

  function memorySize(): int
  {
    return self::MEMORY_SIZE;
  }
}