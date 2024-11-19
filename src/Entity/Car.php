<?php

namespace App\Entity;

class Car extends BaseCar
{
    protected string $carType = 'car';
    private ?int $passengerSeatsCount = null;
    public function getPassengerSeatsCount(): ?int
    {
        return $this->passengerSeatsCount;
    }
    public function setPassengerSeatsCount(int $passengerSeatsCount): static
    {
        $this->passengerSeatsCount = $passengerSeatsCount;

        return $this;
    }
}
