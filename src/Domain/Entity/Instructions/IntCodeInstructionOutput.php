<?php


namespace AdventOfCode\Domain\Entity\Instructions;


class IntCodeInstructionOutput extends IntCodeInstruction
{
  const MEMORY_SIZE = 2;

  private $outputPosition;


  public function __construct(string $outputPosition)
  {
    // echo "OUTPUTS => ".$outputPosition.PHP_EOL;
    $this->outputPosition = $outputPosition;
  }

  function runIn(array &$memory, $input = null)
  {
    return $this->outputPosition;
  }

  function isFinishInstruction(): bool
  {
    return false;
  }


}