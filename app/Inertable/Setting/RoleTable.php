<?php

declare(strict_types=1);

namespace App\Inertable\Setting;

use Illuminate\Database\Eloquent\Builder;
use Modules\User\Entities\Role;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class RoleTable extends Inertable
{
    public function query(): Builder
    {
        return Role::query()->withCount('permissions');
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name'),
            Column::make(__('Guard'), 'guard_name'),
            Column::make(__('Permissions'), 'permissions_count'),
            Column::make(__('Created'), 'created_at'),
            Column::make(__('Author'), 'author.username'),
            Column::action(),
        ];
    }
}
