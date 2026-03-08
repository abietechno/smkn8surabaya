<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'is_active',
    ];

    protected static function booted(): void
    {
        // When a Page is created, auto-create a navbar MenuLink
        static::created(function (Page $page) {
            MenuLink::firstOrCreate(
                ['url' => '/' . $page->slug],
                [
                    'label' => $page->title,
                    'group' => 'navbar',
                    'sort_order' => MenuLink::where('group', 'navbar')->max('sort_order') + 1,
                    'is_active' => $page->is_active,
                ]
            );
        });

        // When a Page is updated, sync the MenuLink
        static::updated(function (Page $page) {
            $link = MenuLink::where('url', '/' . $page->getOriginal('slug'))->first();
            if ($link) {
                $link->update([
                    'label' => $page->title,
                    'url' => '/' . $page->slug,
                    'is_active' => $page->is_active,
                ]);
            }
        });

        // When a Page is deleted, remove the MenuLink
        static::deleted(function (Page $page) {
            MenuLink::where('url', '/' . $page->slug)->delete();
        });
    }
}
