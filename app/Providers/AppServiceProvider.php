<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

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
        // Share categories with all views that use the app layout
        View::composer('layouts.app', function ($view) {
            $categories = Category::where('is_active', true)
                ->orderBy('sort_order')
                ->get();
            $view->with('categories', $categories);
        });
    }
}
