<?php

namespace App\Providers;

use App\Models\WebInformation;
use Illuminate\Support\Facades\View;
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
        View::composer('layouts.web', function ($view) {
            $view->with('webInformation', WebInformation::first());
        });
    }
}
