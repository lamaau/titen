<?php

namespace App\Http\Middleware;

use Inertia\Middleware;
use Tightenco\Ziggy\Ziggy;
use Illuminate\Http\Request;
use Nedwors\Navigator\Facades\Nav;
use Tabuna\Breadcrumbs\Breadcrumbs;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     *
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     */
    public function version(Request $request): ?string
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     */
    public function share(Request $request): array
    {
        return array_merge(parent::share($request), [
            'csrf' => fn () => csrf_token(),
            'auth' => [
                'user' => fn () => $request->user() ? $request->user() : null,
            ],
            'ziggy' => function () use ($request) {
                return array_merge((new Ziggy)->toArray(), [
                    'location' => $request->url(),
                ]);
            },
            'navigators' => Nav::toJson(),
            'breadcrumbs' => Breadcrumbs::current(),
            'locale' => app()->getLocale(),
            'flash' => fn (): array => [
                'success' => $request->session()->get('success'),
                'info' => $request->session()->get('info'),
                'warning' => $request->session()->get('warning'),
                'error' => $request->session()->get('error'),
            ],
        ]);
    }
}
