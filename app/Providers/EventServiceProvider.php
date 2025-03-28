<?php

namespace App\Providers;

use App\Models\KarmaLog;
use App\Observers\KarmaLogObserver;
use Illuminate\Support\ServiceProvider;

class EventServiceProvider extends ServiceProvider
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
        KarmaLog::observe(KarmaLogObserver::class);
    }
}
