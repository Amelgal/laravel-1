<?php

namespace App\Providers;

use App\Models\Category;
use App\Repositories\Category\CategoryCachedRepository;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        View::share([
           'categories'=> CategoryCachedRepository::all(),
        ]);
    }
}
