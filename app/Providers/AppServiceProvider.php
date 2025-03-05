<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;

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
        Schema::defaultStringLength(191);

        view()->composer('frontend/include/navbar', function ($view) {
            $categories = Category::active()->with('sub_categories')->get();
            $categories_nav = Category::take(8)->get();
            $category_m = Category::where('status', 1)->get();
            $user = auth()->user();
            $view->with([
                'categories' => $categories,
                'user' => $user,
                'nav_c' => $categories_nav,
                'category_m' => $category_m
            ]);
        });

        Validator::extend('video_length', function( $attribute, $value, $parameters ) {
            $length = 30; // check length using library
            return $length <= $parameters[0];
        });
    }
}
