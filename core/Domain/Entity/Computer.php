<?php


namespace TDDIntro\Domain\Entity;

final class Computer
{
  private $memory;

  public function __construct(string $memory)
  {
    $this->memory = $memory;
  }

  public static function createFromMemory($memory)
  {
    return new self($memory);
  }

  public function runIntCodeProgram(){
    return IntCodeProgram::fromMemoryState($this->memory)->run();
  }
}