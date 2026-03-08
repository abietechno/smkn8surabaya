<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use App\Models\Extracurricular;
use App\Models\Facility;
use App\Models\Post;
use App\Models\Program;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Staff;
use App\Models\Teacher;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        $data = \Illuminate\Support\Facades\Cache::remember('homepage_data', 3600, function () {
            $publishedPosts = Post::with('author')->published()
                ->latest('published_at')
                ->take(6)
                ->get()
                ->map(fn ($post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'image' => $post->image,
                    'published_at' => $post->published_at ? $post->published_at->translatedFormat('d F Y') : null,
                    'author' => $post->author ? $post->author->name : 'Admin',
                ]);

            return [
                'sliders' => Slider::active()->ordered()->get(),
                'featuredPosts' => $publishedPosts->take(3)->values(),
                'posts' => $publishedPosts,
                'agendas' => Agenda::upcoming()
                    ->take(4)
                    ->get()
                    ->map(fn ($agenda) => [
                        'id' => $agenda->id,
                        'title' => $agenda->title,
                        'date' => $agenda->date ? $agenda->date->translatedFormat('d F Y, H:i') : null,
                        'location' => $agenda->location,
                        'description' => $agenda->description,
                    ]),
                'settings' => Setting::all()->pluck('value', 'key'),
                'teachers' => Teacher::active()->ordered()->take(10)->get(),
                'staff' => Staff::active()->ordered()->get(),
                'programs' => Program::active()->ordered()->get(),
                'facilities' => Facility::active()->ordered()->get(),
                'extracurriculars' => Extracurricular::active()->ordered()->get(),
                'testimonials' => Testimonial::active()->take(6)->get(),
            ];
        });

        return Inertia::render('Home', $data);
    }
}
