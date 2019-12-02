<?php
namespace TDDIntro\Domain\Entity;

class Category
{
  protected $name;


  public function __construct($name)
  {
    $this->name = $name;
  }

  /**
   * @return mixed
   */
  public function name()
  {
    return $this->name;
  }
}
