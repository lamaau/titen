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
                Nav::item(__('Dashboard'))->subItems(
                    [
                        Nav::item(__('Beranda'))
                            ->for('/dashboard')
                            ->heroicon('HomeIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        });
    }
}
