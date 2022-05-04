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
                Nav::item(__('Overview'))->subItems(
                    [
                        Nav::item(__('Dashboard'))
                            ->for('/dashboard')
                            ->heroicon('HomeIcon')
                            ->icon('outline'),
                        // Nav::item(__('Module'))
                        //     ->for('/setting/module')
                        //     ->heroicon('ViewGridIcon')
                        //     ->icon('outline')
                        //     ->when($user->isAdmin()),
                    ],
                ),
            ];
        });
    }
}
