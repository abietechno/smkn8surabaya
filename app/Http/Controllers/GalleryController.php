<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Gallery;
use App\Models\Setting;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::where('is_active', true)
            ->latest()
            ->paginate(12)
            ->through(function ($gallery) {
                return [
                    'title' => $gallery->title,
                    'slug' => $gallery->slug,
                    'cover_image' => $gallery->cover_image ? asset('storage/' . $gallery->cover_image) : null,
                ];
            });

        return Inertia::render('Galleries/Index', [
            'galleries' => $galleries,
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }

    public function show($slug)
    {
        $gallery = Gallery::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $images = collect($gallery->images)->map(function ($image) {
            return asset('storage/' . $image);
        });

        return Inertia::render('Galleries/Show', [
            'gallery' => [
                'title' => $gallery->title,
                'description' => $gallery->description,
                'cover_image' => $gallery->cover_image ? asset('storage/' . $gallery->cover_image) : null,
                'images' => $images,
                'created_at' => $gallery->created_at->format('d M Y'),
            ],
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }
}
