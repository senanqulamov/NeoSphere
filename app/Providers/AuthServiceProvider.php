<?php

namespace App\Providers;

use App\Models\Sphere;
use App\Policies\SpherePolicy;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    protected $policies = [
        Sphere::class => SpherePolicy::class,
    ];
}
