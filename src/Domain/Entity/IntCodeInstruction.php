<?php

namespace AdventOfCode\Domain\Entity;

abstract class IntCodeInstruction
{
  abstract function runIn(array &$memory);
  abstract function isFinishInstruction(): bool;
  abstract function memorySize(): int;
}