<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class NavMenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
        require_once app_path() . '/Helpers/NavMenu.php';
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }

    
}
