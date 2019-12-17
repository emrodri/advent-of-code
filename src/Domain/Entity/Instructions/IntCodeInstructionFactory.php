<?php


namespace AdventOfCode\Domain\Entity\Instructions;


use Exception;

class IntCodeInstructionFactory
{
  const OP_CODE_FINISHED = 99;
  const OP_CODE_ADD = 1;
  const OP_CODE_MULTIPLY = 2;
  const OP_CODE_STORE = 3;
  const OP_CODE_OUTPUT = 4;
  const OP_CODE_JUMP_IF_TRUE = 5;
  const OP_CODE_JUMP_IF_FALSE = 6;
  const OP_CODE_LESS_THAN = 7;
  const OP_CODE_EQUALS = 8;


  public static function fromMemory($memory, $pointer)
  {

    $opCode = intval(substr($memory[$pointer], -2, 2));
    // echo "OPERACION =>" . $opCode . PHP_EOL;
    switch ($opCode) {
      case self::OP_CODE_ADD:
        list($param1, $param2, $resultPosition) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionAdd($param1, $param2, $resultPosition);
      case self::OP_CODE_MULTIPLY:
        list($param1, $param2, $resultPosition) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionMultiply($param1, $param2, $resultPosition);
      case self::OP_CODE_STORE:
        $storePosition = $memory[$pointer + 1];
        return new IntCodeInstructionStore($storePosition);
      case self::OP_CODE_OUTPUT:
        list($param1) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionOutput($param1);
      case self::OP_CODE_JUMP_IF_TRUE:
        list($param1, $param2) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionJumpIfTrue($param1, $param2);
      case self::OP_CODE_JUMP_IF_FALSE:
        list($param1, $param2) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionJumpIfFalse($param1, $param2);
      case self::OP_CODE_LESS_THAN:
        list($param1, $param2, $resultPosition) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionLessThan($param1, $param2, $resultPosition);
      case self::OP_CODE_EQUALS:
        list($param1, $param2, $resultPosition) = self::getParamsForMethod($memory, $pointer);
        return new IntCodeInstructionEquals($param1, $param2, $resultPosition);
      case self::OP_CODE_FINISHED:
        return new IntCodeInstructionFinish();
      default:
        throw new Exception("Instruction not recognized => " . $opCode);
    }
  }


  private static function getParamMode($memory, $parameter): int
  {
    $memory = $memory / 100;
    if ($parameter == 1 && $memory % 10 > 0) {
      return 1;
    } else if ($parameter == 2 && ($memory / 10) % 10 > 0) {
      return 1;
    }
    return 0;
  }

  private static function getParamValue($memory, $position, int $paramMode)
  {
    return ($paramMode === 0 && isset($memory[$position])) ? $memory[$position] : $position;
  }

  private static function getParamsForMethod($memory, $pointer): array
  {
    $param1Mode = self::getParamMode($memory[$pointer], 1);
    $param2Mode = self::getParamMode($memory[$pointer], 2);
    $param1 = isset($memory[$pointer + 1]) ? self::getParamValue($memory, $memory[$pointer + 1], $param1Mode) : null;
    $param2 = isset($memory[$pointer + 2]) ? self::getParamValue($memory, $memory[$pointer + 2], $param2Mode) : null;
    $resultPosition = isset($memory[$pointer + 3]) ? $memory[$pointer + 3] : null;
    return array($param1, $param2, $resultPosition);
  }
}