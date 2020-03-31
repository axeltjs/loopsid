<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\PostObserver;
use App\Observers\UserObserver;
use App\Models\Post;
use App\Models\User;

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
        Post::observe(PostObServer::class);
        User::observe(UserObServer::class);
    }
}
