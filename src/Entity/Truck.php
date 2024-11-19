<?php

namespace App\Entity;

class Truck extends BaseCar
{
    protected string $carType = 'truck';

    private ?float $bodyLength = null;

    private ?float $bodyWidth = null;

    private ?float $bodyHeight = null;

    public function getBodyLength(): ?float
    {
        return $this->bodyLength;
    }

    public function setBodyLength(float $bodyLength): static
    {
        $this->bodyLength = $bodyLength;

        return $this;
    }

    public function getBodyWidth(): ?float
    {
        return $this->bodyWidth;
    }

    public function setBodyWidth(float $bodyWidth): static
    {
        $this->bodyWidth = $bodyWidth;

        return $this;
    }

    public function getBodyHeight(): ?float
    {
        return $this->bodyHeight;
    }

    public function setBodyHeight(float $bodyHeight): static
    {
        $this->bodyHeight = $bodyHeight;

        return $this;
    }

    public function setBodyDimensions(string $dimensions): self
    {
        if (empty($dimensions)) {
            $this->bodyLength = 0;
            $this->bodyWidth = 0;
            $this->bodyHeight = 0;
            return $this;
        }

        [$length, $width, $height] = array_map(null, explode('x', $dimensions));
        $this->bodyLength = (float)$length;
        $this->bodyWidth = (float)$width;
        $this->bodyHeight = (float)$height;

        return $this;
    }

    public function getBodyVolume(): float
    {
        return ($this->bodyLength ?? 0) * ($this->bodyWidth ?? 0) * ($this->bodyHeight ?? 0);
    }
}
