<?php

namespace App\Providers;

use Blade;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('auth', function ($expression) {
            return "<?php if(Auth::check()) : ?>";
        });
        Blade::directive('endauth', function ($expression) {
            return "<?php endif; ?>";
        });
        Blade::directive('guest', function ($expression) {
            return "<?php if(!Auth::check()) : ?>";
        });
        Blade::directive('endguest', function ($expression) {
            return "<?php endif; ?>";
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
