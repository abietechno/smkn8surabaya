<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    use \App\Models\Traits\ClearsHomepageCache;

    protected $fillable = [
        'title',
        'description',
        'image',
        'button_text',
        'button_url',
        'sort_order',
        'is_active',
        'show_text',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'show_text' => 'boolean',
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }
}
