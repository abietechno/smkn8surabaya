<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Setting;

class PageController extends Controller
{
    public function show($slug)
    {
        $page = \App\Models\Page::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        return Inertia::render('StaticPage', [
            'page' => $page,
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }
}

