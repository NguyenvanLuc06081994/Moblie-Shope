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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('crud',function ($user){
            foreach ($user->roles as $role){
                if ($role->name === 'admin'){
                    return  true;
                }
            }
           return false;
        });

        Gate::define('update',function ($user){
            foreach ($user->roles as $role){
                if ($role->name === 'edit'){
                    return  true;
                }
            }
            return false;
        });

    }
}
