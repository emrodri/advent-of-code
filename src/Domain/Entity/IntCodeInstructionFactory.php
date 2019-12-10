<?php


namespace AdventOfCode\Domain\Entity;


class IntCodeInstructionFactory
{
  const OP_CODE_FINISHED = 99;
  const OP_CODE_ADD = 1;
  const OP_CODE_MULTIPLY = 2;
  const OP_CODE_STORE = 3;
  const OP_CODE_OUTPUT = 4;


  public static function fromMemory($memory, $pointer)
  {
    $opCode = intval(substr($memory[$pointer], -2, 2));
    $param1Mode = self::getParamMode($memory[$pointer], 1);
    $param2Mode = self::getParamMode($memory[$pointer], 2);
    switch ($opCode) {
      case self::OP_CODE_ADD:
        $param1 = self::getParamValue($memory, $memory[$pointer + 1], $param1Mode);
        $param2 = self::getParamValue($memory, $memory[$pointer + 2], $param2Mode);
        $resultPosition = $memory[$pointer + 3];
        return new IntCodeInstructionAdd($param1, $param2, $resultPosition);
      case self::OP_CODE_MULTIPLY:
        $param1 = self::getParamValue($memory, $memory[$pointer + 1], $param1Mode);
        $param2 = self::getParamValue($memory, $memory[$pointer + 2], $param2Mode);
        $resultPosition = $memory[$pointer + 3];
        return new IntCodeInstructionMultiply($param1, $param2, $resultPosition);
      case self::OP_CODE_STORE:
        $param = $memory[$pointer + 1];
        return new IntCodeInstructionStore($param);
      case self::OP_CODE_OUTPUT:
        $param = self::getParamValue($memory, $memory[$pointer + 1], $param1Mode);
        return new IntCodeInstructionOutput($param);
      case self::OP_CODE_FINISHED:
        return new IntCodeInstructionFinish();
      default:
        return null;
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
    return ($paramMode === 0) ? $memory[$position] : $position;
  }
}