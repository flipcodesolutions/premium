<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
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
        \Illuminate\Pagination\Paginator::useBootstrapFive();

        if (app()->environment('production') || request()->header('x-forwarded-proto') === 'https' || str_starts_with((string) config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }

        view()->composer(['components.navbar', 'components.footer'], function ($view) {
            try {
                $navServices = \App\Models\Service::where('status', true)->ordered()->get();
                $view->with('navServices', $navServices);
            } catch (\Throwable $e) {
                $view->with('navServices', collect());
            }
        });
    }
}
