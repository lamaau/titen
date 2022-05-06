<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;
use Nedwors\Navigator\Facades\Nav;
use Nwidart\Modules\Facades\Module;
use Tabuna\Breadcrumbs\Breadcrumbs;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {
        return array_merge(parent::share($request), [
            'auth' => fn (): array => ['user' => $request->user() ?: null],
            'flash' => fn (): array => [
                'error' => $request->session()->get('error'),
                'success' => $request->session()->get('success'),
            ],
            'app' => fn (): array => $request->user() ? static::handleInertiaSharedData($request) : [],
        ]);
    }

    public static function handleInertiaSharedData(Request $request)
    {
        $modules = collect(Module::allEnabled())->keys()->map(fn ($value) => strtolower($value));

        $navigators = $modules->map(function ($module) use ($request) {
            return Nav::toJson($module);
        });

        $filtered = collect(Nav::toJson())->merge($navigators->filter(function ($collection) {
            return count(json_decode($collection));
        }));

        return [
            'navigators' => $filtered,
            'breadcrumbs' => Breadcrumbs::current(),
        ];
    }
}
