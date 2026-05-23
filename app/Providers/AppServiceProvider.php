<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Models\Review;
use App\Policies\ReviewPolicy;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        Gate::policy(Review::class, ReviewPolicy::class);
    }
}