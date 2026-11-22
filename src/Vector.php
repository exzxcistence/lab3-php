<?php

namespace App;

class Vector
{
    public $x;
    public $y;

    public function __construct(float $x, float $y)
    {
        $this->x = $x;
        $this->y = $y;
    }

    public function length(): float
    {
        return hypot($this->x, $this->y);
    }

    public function isZero(): bool
    {
        return $this->x == 0 && $this->y == 0;
    }

    public function isPerpendicularTo(Vector $other): bool
    {
        if ($this->isZero() || $other->isZero()) {
            return false;
        }

        $dotProduct = $this->x * $other->x + $this->y * $other->y;
        return abs($dotProduct) < 1e-10;
    }
}