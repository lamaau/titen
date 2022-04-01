<?php

namespace App\Enums\Concerns;

use Illuminate\Support\Collection;

interface HasLabel
{
    /**
     * Get enum label name.
     *
     * @return string
     */
    public function label(): string;

    /**
     * Get enums formated.
     *
     * @return Collection
     */
    public static function labels(): Collection;
}
