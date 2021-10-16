<?php

namespace App\Providers;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\InterfaceCategory;
use App\Repositories\BaseRepository;
use App\Repositories\InterfaceRepository;
use App\Repositories\UserInterfaceRepository;
use App\Repositories\UserRepository;
use App\Services\CategoryServices\CategoryService;
use App\Services\CategoryServices\InterfaceCategoryService;
use App\Services\UserServices\UserService;
use App\Services\UserServices\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(InterfaceRepository::class, BaseRepository::class);
        $this->app->bind(UserInterfaceRepository::class,UserRepository::class);
        $this->app->bind(UserServiceInterface::class, UserService::class);
        $this->app->bind(InterfaceCategory::class,CategoryRepository::class);
        $this->app->bind(InterfaceCategoryService::class,CategoryService::class);

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}

