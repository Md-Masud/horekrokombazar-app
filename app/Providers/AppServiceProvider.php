<?php

namespace App\Providers;

use App\Repositories\BaseRepository;
use App\Repositories\InterfaceRepository;
use App\Services\UserServices\UserService;
use App\Services\UserServices\UserServiceInterface;
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
}
