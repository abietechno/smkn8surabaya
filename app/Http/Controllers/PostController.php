<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Setting;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::published()
                ->latest('published_at')
                ->paginate(9)
                ->through(fn ($post) => [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'excerpt' => $post->excerpt,
                    'image' => $post->image,
                    'published_at' => $post->published_at->translatedFormat('d F Y'),
                    'author' => $post->author->name,
                ]),
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }

    public function show(Post $post): Response
    {
        abort_unless($post->status->value === 'published', 404);

        $recentPosts = Post::published()
            ->where('id', '!=', $post->id)
            ->latest('published_at')
            ->take(5)
            ->get()
            ->map(fn ($p) => [
                'id' => $p->id,
                'title' => $p->title,
                'slug' => $p->slug,
                'image' => $p->image,
                'published_at' => $p->published_at->translatedFormat('d F Y'),
            ]);

        return Inertia::render('Posts/Show', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'slug' => $post->slug,
                'content' => $post->content,
                'image' => $post->image,
                'published_at' => $post->published_at->translatedFormat('d F Y'),
                'author' => $post->author->name,
            ],
            'recentPosts' => $recentPosts,
            'settings' => Setting::all()->pluck('value', 'key'),
        ]);
    }
}
