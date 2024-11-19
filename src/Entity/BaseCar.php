<?php

namespace App\Entity;

 abstract class BaseCar
{
    protected string $carType;
    protected ?string $brand = null;
    protected ?string $photoFileName = null;
    private ?float $carrying = null;

    public function getCarType(): ?string
    {
        return $this->carType;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getPhotoFileName(): ?string
    {
        return pathinfo($this->photoFileName, PATHINFO_EXTENSION);
    }

    public function setPhotoFileName(string $photoFileName): static
    {
        $this->photoFileName = $photoFileName;

        return $this;
    }

    public function getCarrying(): ?float
    {
        return $this->carrying;
    }

    public function setCarrying(float $carrying = null): static
    {
        $this->carrying = $carrying;

        return $this;
    }
}
