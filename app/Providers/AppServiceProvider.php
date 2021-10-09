<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $setting = \App\Models\Setting::first();
        Paginator::useBootstrap();
        View::share('recent_posts', \App\Models\Post::orderBy('id', 'desc')->limit($setting->recent_limit)->get());
        View::share('popular_posts', \App\Models\Post::orderBy('views', 'desc')->limit($setting->popular_limit)->get());
    }
}
