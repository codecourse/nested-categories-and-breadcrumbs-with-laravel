<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Support\Facades\Route;
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
        Route::bind('categoryFromPath', function (string $path) {
            $trail = explode('/', $path);
            $last = last($trail);

            $category = Category::where('slug', $last)->firstOrFail();

            $category->ancestors->each(function ($ancestor) use ($trail) {
                if (!in_array($ancestor->slug, $trail)) {
                    abort(404);
                }
            });

            return $category;
        });
    }
}
