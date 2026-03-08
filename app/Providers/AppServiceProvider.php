<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if (config('app.env') === 'production') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
        // Fix Livewire update route for subfolder deployment.
        // The app runs at /smkn8/public (no virtual host), so PHP sees routes
        // relative to public/ while the browser sees them relative to /.
        // We need Livewire to emit data-update-uri="/smkn8/public/livewire/update"
        // so the browser POSTs to the right URL.
        $subfolderPrefix = '/smkn8/public';

        \Livewire\Livewire::setUpdateRoute(function ($handle) use ($subfolderPrefix) {
            return \Illuminate\Support\Facades\Route::post('livewire/update', $handle)
                ->middleware('web');
        });

        // Override getUpdateUri to include the subfolder prefix.
        $handleRequests = app(\Livewire\Mechanisms\HandleRequests\HandleRequests::class);
        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Foundation\Events\LocaleUpdated::class,
            function () {}
        );

        // Bind a custom version that returns the prefixed URI.
        app()->extend(
            \Livewire\Mechanisms\HandleRequests\HandleRequests::class,
            function ($original) use ($subfolderPrefix) {
                return new class($original, $subfolderPrefix) extends \Livewire\Mechanisms\HandleRequests\HandleRequests {
                    public function __construct(private $parent, private string $prefix) {}

                    public function getUpdateUri() {
                        return $this->prefix . '/livewire/update';
                    }
                };
            }
        );
    }
}
