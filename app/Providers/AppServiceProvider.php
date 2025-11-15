<?php

namespace App\Providers;

use App\Models\WebInformation;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;
use App\Models\BranchOffice;

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
            $insightCategories = Category::take(5)->pluck('name', 'id');
            $branchOffices = BranchOffice::all();
            $webInformation = WebInformation::first();

            $view->with(compact('insightCategories', 'branchOffices', 'webInformation'));
        });
    }
}
