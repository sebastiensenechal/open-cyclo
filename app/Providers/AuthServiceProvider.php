<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Flag' => 'App\Policies\FlagsPolicy',
        'App\Post' => 'App\Policies\PostsPolicy',
        'App\Model'  => 'App\Policies\ModelPolicy',
        'App\User'  => 'App\Policies\UsersPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage_flag', function () {
            return auth()->check();
        });

        Gate::define('manage_post', function () {
            return auth()->check();
        });

        Gate::define('create', function () {
            return auth()->check();
        });

        Gate::define('store', function () {
            return auth()->check();
        });

        Gate::define('edit', function () {
            return auth()->check();
        });

        Gate::define('update', function () {
            return auth()->check();
        });

        Gate::define('destroy', function () {
            return auth()->check();
        });
    }
}
