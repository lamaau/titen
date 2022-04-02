<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\ServiceProvider;
use Nedwors\Navigator\Facades\Nav;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Menu'))->subItems(
                    [
                        Nav::item(__('Dashboard'))
                            ->for('/dashboard')
                            ->heroicon('HomeIcon')
                            ->icon('outline'),
                    ]
                ),
                Nav::item(__('Setting'))->subItems(
                    [
                        Nav::item(__('User'))
                            ->for('/setting/user')
                            ->heroicon('UsersIcon')
                            ->icon('outline'),
                        Nav::item(__('Role & Permission'))
                            ->for('/setting/role')
                            ->heroicon('LockClosedIcon')
                            ->icon('outline'),
                    ]
                )->when($user->hasRole('Admin')),
            ];
        });
    }
}
