<?php

namespace App\Providers;

use App\Models\Instansi;
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
        // Singleton for global access
        app()->singleton('instansi', function () {
            $domain = implode('.', array_slice(explode('.', request()->getHost()), 1));
            return Instansi::where('web', $domain)->first();
        });
    
        // Share with all views
        View::composer('*', function ($view) {
            $view->with('instansi', app('instansi'));
        });
    }
}
