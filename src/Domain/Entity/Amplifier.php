<?php


namespace AdventOfCode\Domain\Entity;


use AdventOfCode\Domain\Entity\Programs\AmplifierControllerSoftware;

class Amplifier
{
  private $phase;
  private $program;

  private function __construct(AmplifierControllerSoftware $program, $phase)
  {
    $this->program = $program;
    $this->phase = $phase;
    $this->program->setInput($this->phase);
  }

  public static function installOnShip(AmplifierControllerSoftware $program, int $phase)
  {
    return new self($program, $phase);
  }

  public function run($inputSignal)
  {
    $this->program->setInput($inputSignal);
    $this->program->run();
    return $this->program->output();
  }

}