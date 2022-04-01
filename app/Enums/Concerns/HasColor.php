<?php

namespace App\Enums\Concerns;

interface HasColor
{
    /**
     * Case color.
     *
     * @return string
     */
    public function color(): string;
}
