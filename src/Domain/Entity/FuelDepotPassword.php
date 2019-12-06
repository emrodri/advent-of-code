<?php


namespace AdventOfCode\Domain\Entity;


class FuelDepotPassword
{
  private $password;

  private function __construct(string $password)
  {
    $this->password = $password;
  }

  public static function fromInput(string $password)
  {
    return new self($password);
  }

  public function isValid()
  {

    return (
        $this->assertsHasSixDigits() &&
        $this->assertsTwoSiblingsDigitsAreTheSame() &&
        $this->assertDigitsNeverDecrease()
    );
  }

  private function assertsHasSixDigits()
  {
    return strlen($this->password) == 6;
  }

  private function assertsTwoSiblingsDigitsAreTheSame()
  {
    $siblingsFound = [];
    foreach (str_split($this->password) as $key => $char) {
      if ($key > 0 && intval($this->password[$key - 1]) == intval($char)) {
        if (isset($siblingsFound[$char])){
          $siblingsFound[$char] = $siblingsFound[$char] + 1;
        } else {
          $siblingsFound[$char] = 1;
        }
      }
    }
    return in_array(1, array_values($siblingsFound));
  }

  private function assertDigitsNeverDecrease()
  {
    foreach (str_split($this->password) as $key => $char) {
      if ($key > 0 && intval($this->password[$key - 1]) > intval($char)) {
        return false;
      }
    }
    return true;
  }
}