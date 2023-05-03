<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Gate::define('syarikat_rakam', function(User $user){

            return $user->choose_user_id === 1;
        });
        Gate::define('syarikat_stesen', function(User $user){

            return $user->choose_user_id === 2;
        });
        
        Gate::define('penilai', function(User $user){

            return $user->choose_user_id === 3;
        });

        Gate::define('pelulus', function(User $user){

            return $user->choose_user_id === 4;
        });

        Gate::define('admin', function(User $user){

            return $user->choose_user_id === 5;
        });


    }
}
