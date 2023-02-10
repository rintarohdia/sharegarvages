<?php

namespace App\Providers;

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
        //
    }
    protected $policies = [
        App\Models\User::class=>App\Policies\UserPolicy::class,
        App\Models\corp::class=>App\Policies\CorpPolicy::class,
    ];
}
