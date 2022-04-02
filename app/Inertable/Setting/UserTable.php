<?php

declare(strict_types=1);

namespace App\Inertable\Setting;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rizkhal\Inertable\Column;
use Rizkhal\Inertable\Inertable;

class UserTable extends Inertable
{
    public function query(): Builder
    {
        return User::query();
    }

    public function columns(): array
    {
        return [
            Column::make(__('Username'), 'username')->sortable(),
            Column::make(__('Email'), 'email')->sortable(),
            Column::make(__('Role'), 'role'),
            Column::make(__('Last Logged In'), 'last_logged_in_at')->sortable(),
            Column::make(__('Created'), 'created_at')->sortable(),
            Column::action(),
        ];
    }
}
