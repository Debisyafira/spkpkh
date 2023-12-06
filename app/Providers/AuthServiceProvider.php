<?php

namespace App\Providers;

use App\Enums\RoleEnum;
use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
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
        Gate::define('isAdmin', function ($user) {
            return $user->role == RoleEnum::ADMIN ? Response::allow() : Response::deny('You must be an admin to access this feature');
        });

        Gate::define('isOpt', function ($user) {
            return $user->role == RoleEnum::OPT ? Response::allow() : Response::deny('You must be an operator to access this feature');
        });

        Gate::define('isUser', function ($user) {
            return $user->role == RoleEnum::USER ? Response::allow() : Response::deny('You must be an user to access this feature');
        });
    }
}
