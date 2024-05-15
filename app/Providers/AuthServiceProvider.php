<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
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
    
        Gate::define('isSuperAdmin', function ($user) {
            return $user->role == 'super_admin';
        });

        Gate::define('isSubAdmin', function ($user) {
            return $user->role == 'sub_admin';
        });

        Gate::define('isUser', function ($user) {
            return $user->role == 'user';
        });
    }
}
