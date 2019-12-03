<?php
namespace TDDIntro\Domain\Entity;

use Exception;

final class IntCodeProgram
{

  const OPCODE_FINISHED = 99;
  const OPCODE_ADD = 1;
  const OPCODE_MULTIPLY = 2;

  private $program;

  public function __construct(string $instructions)
  {
    $this->program = explode(',', $instructions);
  }

  public static function fromMemoryState(string $instructions)
  {
    return new self($instructions);
  }

  public function run()
  {
    $arrayPosition = 0;
    $finished = false;
    while (!$finished) {
      $opCodePosition = $arrayPosition;
      $op1Position = $arrayPosition + 1;
      $op2Position = $arrayPosition + 2;
      $resultPosition = $arrayPosition + 3;
      $opCode = $this->program[$opCodePosition];
      switch ($opCode) {
        case self::OPCODE_ADD:
          $this->addOperation($op1Position, $op2Position, $resultPosition);
          break;
        case self::OPCODE_MULTIPLY:
          $this->multiplyOperation($op1Position, $op2Position, $resultPosition);
          break;
        case self::OPCODE_FINISHED:
          $finished = true;
          break;
        default:
          throw new Exception("ERROR");
      }
      $arrayPosition += 4;
    }

    return $this->program[0];
  }


  private function addOperation(int $op1Position, int $op2Position, int $resultPosition)
  {
    $firstOperator = $this->program[$op1Position];
    $secondOperator = $this->program[$op2Position];
    $resultStore = $this->program[$resultPosition];
    $this->program[$resultStore] = $this->program[$firstOperator] + $this->program[$secondOperator];
  }

  private function multiplyOperation(int $op1Position, int $op2Position, int $resultPosition): void
  {
    $firstOperator = $this->program[$op1Position];
    $secondOperator = $this->program[$op2Position];
    $resultStore = $this->program[$resultPosition];
    $this->program[$resultStore] = $this->program[$firstOperator] * $this->program[$secondOperator];
  }
}