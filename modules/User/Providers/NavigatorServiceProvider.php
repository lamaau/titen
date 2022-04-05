<?php

namespace Modules\User\Providers;

use App\Models\User;
use Nedwors\Navigator\Facades\Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('User'))->subItems(
                    [
                        Nav::item(__('User'))
                            ->for('/setting/user')
                            ->heroicon('UsersIcon')
                            ->icon('outline'),
                        Nav::item(__('Roles'))
                            ->for('/setting/role')
                            ->heroicon('LockClosedIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        }, 'user');
    }
}
