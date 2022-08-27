<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Constants\RoleStatus;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Auth;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isAdmin', function($user) {
            return Auth::user()->role->name == RoleStatus::ADMIN;
        });

        Gate::define('isManager', function($user) {
            return Auth::user()->role->name == RoleStatus::MANAGER;
        });

        Gate::define('isClient', function($user) {
            return Auth::user()->role->name == RoleStatus::CLIENT;
        });

    }
}
