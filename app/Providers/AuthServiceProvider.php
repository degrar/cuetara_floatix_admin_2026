<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\User;
use Duplex\Enums\Role;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->defineGates();
    }

    private function defineGates(): void
    {
        Gate::define('access-dashboard', function (?User $user) {
            return
                $user?->role == Role::Marketing->value ||
                $user?->role == Role::Admin->value
                ;
        });

        Gate::define('is-admin', function (?User $user) {
            return $user?->role == Role::Admin->value;
        });

        Gate::define('is-marketing', function (?User $user) {
            return $user?->role == Role::Admin->value;
        });
    }
}
