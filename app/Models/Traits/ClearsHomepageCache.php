<?php

namespace App\Models\Traits;

use Illuminate\Support\Facades\Cache;

trait ClearsHomepageCache
{
    protected static function bootClearsHomepageCache(): void
    {
        static::saved(function () {
            Cache::forget('homepage_data');
        });

        static::deleted(function () {
            Cache::forget('homepage_data');
        });
    }
}
