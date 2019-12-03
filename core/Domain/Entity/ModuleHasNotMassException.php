<?php


namespace TDDIntro\Domain\Entity;


use Exception;

class ModuleHasNotMassException extends Exception
{

  const MESSAGE = "Module mass has to be greater than 0";

  public function __construct($code = 0, Exception $previous = null)
  {
    parent::__construct(self::MESSAGE, $code, $previous);
  }
}