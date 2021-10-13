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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\Post' => 'App\Policies\PostPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // define gates 
        
        Gate::define('admin',function($user){
            return $user->hasRole('admin');
        });
        Gate::define('editor',function($user){
            return $user->hasRole('editor');
        });
        Gate::define('author',function($user){
            return $user->hasRole('author');
        });
        
    }
}
