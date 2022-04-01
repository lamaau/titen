<?php

namespace App\Enums;

use App\Enums\Concerns\HasLabel;
use Illuminate\Support\Collection;
use App\Enums\Concerns\InvokableCases;

enum Status: int implements HasLabel
{
    use InvokableCases;

    case ENABLED = 1;
    case DISABLED = 2;

    public function label(): string
    {
        return match ($this) {
            self::ENABLED => __('Enable'),
            self::DISABLED => __('Disable'),
        };
    }

    public static function labels(): Collection
    {
        return collect(self::cases())->map(fn ($object) => ['value' => $object->value, 'label' => $object->label()]);
    }
}
