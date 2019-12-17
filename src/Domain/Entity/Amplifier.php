<?php


namespace AdventOfCode\Domain\Entity;


class Amplifier
{
  private $phase;
  private $computer;

  private function __construct(Computer $computer, $phase)
  {
    $this->computer = $computer;
    $this->phase = $phase;
  }

  public static function installOn(Computer $computer, $phase)
  {
    return new self($computer,$phase);
  }

  public function run($inputSignal)
  {
    return $this->computer->runAmplifierProgram([$this->phase, $inputSignal]);
  }

}