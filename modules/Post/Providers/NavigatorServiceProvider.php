<?php

namespace Modules\Post\Providers;

use App\Models\User;
use Nedwors\Navigator\Facades\Nav;
use Illuminate\Support\ServiceProvider;

class NavigatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        Nav::define(function (User $user) {
            return [
                Nav::item(__('Post'))->subItems(
                    [
                        Nav::item(__('Post'))
                            ->for('/post')
                            ->heroicon('PencilAltIcon')
                            ->icon('outline'),
                        Nav::item(__('Tag'))
                            ->for('/tag')
                            ->heroicon('TagIcon')
                            ->icon('outline'),
                        Nav::item(__('Category'))
                            ->for('/category')
                            ->heroicon('TagIcon')
                            ->icon('outline'),
                    ]
                ),
            ];
        }, 'post');
    }
}
