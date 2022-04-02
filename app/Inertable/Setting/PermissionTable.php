<?php

declare(strict_types=1);

namespace App\Inertable\Setting;

use App\Models\Setting\Permission;
use Illuminate\Database\Eloquent\Builder;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class PermissionTable extends Inertable
{
    public function query(): Builder
    {
        return Permission::query();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Name'), 'name')->sortable(),
            Column::make(__('Guard'), 'guard_name')->sortable(),
            Column::make(__('Description'), 'description')->searchable(),
            Column::make(__('Created'), 'created_at')->sortable(),
            Column::action(),
        ];
    }
}
