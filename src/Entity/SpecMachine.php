<?php

namespace App\Entity;

class SpecMachine extends BaseCar
{
    protected string $carType = 'spec_machine';

    private ?string $extra = null;

    public function getExtra(): string|null
    {
        return $this->extra;
    }

    public function setExtra(string $extra = null): static
    {
        $this->extra = $extra;

        return $this;
    }
}
