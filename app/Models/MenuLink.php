<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuLink extends Model
{
    protected $fillable = [
        'parent_id',
        'label',
        'url',
        'description',
        'icon',
        'group',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function activeChildren()
    {
        return $this->children()->where('is_active', true)->orderBy('sort_order');
    }

    public function scopeRoots($query)
    {
        return $query->whereNull('parent_id');
    }

    public function scopeNavbar($query)
    {
        return $query->where('group', 'navbar');
    }

    public function scopeFooter($query)
    {
        return $query->where('group', 'footer');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    protected static function booted(): void
    {
        static::saved(function () {
            \Illuminate\Support\Facades\Cache::forget('nav_links');
            \Illuminate\Support\Facades\Cache::forget('footer_links');
        });

        static::deleted(function () {
            \Illuminate\Support\Facades\Cache::forget('nav_links');
            \Illuminate\Support\Facades\Cache::forget('footer_links');
        });
    }
}
