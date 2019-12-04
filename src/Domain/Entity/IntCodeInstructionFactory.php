<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionFactory
{
  const OP_CODE_FINISHED = 99;
  const OP_CODE_ADD = 1;
  const OP_CODE_MULTIPLY = 2;
  const OPERATION_CODE_POSITION = 0;
  const FIRST_OPERATOR_POSITION = 1;
  const SECOND_OPERATOR_POSITION = 2;
  const RESULT_POSITION = 3;

  public static function fromMemory($memory)
  {
    $opCode = $memory[self::OPERATION_CODE_POSITION];
    switch ($opCode) {
      case self::OP_CODE_ADD:
        return new IntCodeInstructionAdd($memory[self::FIRST_OPERATOR_POSITION], $memory[self::SECOND_OPERATOR_POSITION], $memory[self::RESULT_POSITION]);
      case self::OP_CODE_MULTIPLY:
        return new IntCodeInstructionMultiply($memory[self::FIRST_OPERATOR_POSITION], $memory[self::SECOND_OPERATOR_POSITION], $memory[self::RESULT_POSITION]);
      case self::OP_CODE_FINISHED:
        return new IntCodeInstructionFinish();
      default:
        return null;
    }
  }
}