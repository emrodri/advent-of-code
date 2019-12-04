<?php

namespace AdventOfCode\Domain\Entity;

abstract class IntCodeInstruction
{
  abstract function runIn(array &$memory): array;
  abstract function isFinishInstruction(): bool;
}