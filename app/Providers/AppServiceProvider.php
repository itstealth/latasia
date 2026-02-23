<?php

namespace App\Providers;

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
<<<<<<< HEAD
    {
        //
    }
}
=======
{
    if (config('app.env') === 'production') {
        \URL::forceScheme('https');
    }
}
}
>>>>>>> 696cd71a52571175287ca3b46bd59744593fc306
