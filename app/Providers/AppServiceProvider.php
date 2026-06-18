<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Observers\ModelActivityObserver;
use App\Models\Project;
use App\Models\News;
use App\Models\Publication;
use App\Models\Career;
use App\Models\Message;

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
        // Register model observers to generate admin notifications
        Project::observe(ModelActivityObserver::class);
        News::observe(ModelActivityObserver::class);
        Publication::observe(ModelActivityObserver::class);
        Career::observe(ModelActivityObserver::class);
        Message::observe(ModelActivityObserver::class);
    }
}
