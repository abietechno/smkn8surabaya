<?php

namespace App\Http\Middleware;

use App\Models\MenuLink;
use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Middleware;

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
     * Define the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     *
     * @return array<string, mixed>
     */
    public function share(Request $request): array
    {
        return [
            ...parent::share($request),
            'baseUrl' => url('/'),
            'navLinks' => fn () => \Illuminate\Support\Facades\Cache::remember('nav_links', 3600, fn () => MenuLink::active()->navbar()->roots()->ordered()
                ->with(['activeChildren' => fn ($q) => $q->select('id', 'parent_id', 'label', 'url', 'description', 'icon')])
                ->get(['id', 'label', 'url', 'description', 'icon'])),
            'footerLinks' => fn () => \Illuminate\Support\Facades\Cache::remember('footer_links', 3600, fn () => MenuLink::active()->footer()->roots()->ordered()
                ->with(['activeChildren' => fn ($q) => $q->select('id', 'parent_id', 'label', 'url')])
                ->get(['id', 'label', 'url'])),
            'settings' => fn () => \Illuminate\Support\Facades\Cache::remember('global_settings', 3600, fn () => Setting::all()->pluck('value', 'key')),
        ];
    }
}
