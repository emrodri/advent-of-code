<?php

namespace Entity;

use AdventOfCode\Domain\Entity\FuelDepotPassword;
use PHPUnit\Framework\TestCase;

class FuelDepotTest extends TestCase
{
  public function testPasswordIsValid()
  {
    $input = "111122";
    $fuelDepotPassword = FuelDepotPassword::fromInput($input);
    $this->assertEquals(true, $fuelDepotPassword->isValid());
  }

  public function testPasswordIsNotValidIsNotHasSixDigits()
  {
    $input = "";
    $fuelDepotPassword = FuelDepotPassword::fromInput($input);
    $this->assertEquals(false, $fuelDepotPassword->isValid());
  }

  public function testPasswordIsNotValidIfHasDigitsDecrements()
  {
    $input = "223450";
    $fuelDepotPassword = FuelDepotPassword::fromInput($input);
    $this->assertEquals(false, $fuelDepotPassword->isValid());
  }

  public function testPasswordIsNotValidIfTwoSiblingsAreNotTheSame()
  {
    $input = "123789";
    $fuelDepotPassword = FuelDepotPassword::fromInput($input);
    $this->assertEquals(false, $fuelDepotPassword->isValid());
  }

  public function testPasswordIsNotValidIfTwoEqualSiblingsAreOnly2()
  {
    $input = "123444";
    $fuelDepotPassword = FuelDepotPassword::fromInput($input);
    $this->assertEquals(false, $fuelDepotPassword->isValid());
  }

}
