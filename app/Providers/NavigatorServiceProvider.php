<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\User\Entities\User;
use Nedwors\Navigator\Facades\Nav;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Overview'))->subItems(
                    [
                        Nav::item(__('Beranda'))
                            ->for('/dashboard')
                            ->heroicon('HomeIcon')
                            ->icon('outline'),
                    ],
                ),
            ];
        });
    }
}
