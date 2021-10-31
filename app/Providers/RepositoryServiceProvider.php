<?php

namespace App\Providers;
use App\Repositories\Admin\BrandRepository;
use App\Repositories\Admin\CategoryRepository;
use App\Repositories\Admin\ChildCategoryRepository;
use App\Repositories\Admin\InterfaceBrand;
use App\Repositories\Admin\InterfaceCategory;
use App\Repositories\Admin\InterfaceChildCategory;
use App\Repositories\Admin\InterfaceSeo;
use App\Repositories\Admin\InterfaceSubCategoryRepository;
use App\Repositories\Admin\SeoRepository;
use App\Repositories\Admin\SubCategoryRepository;
use App\Repositories\BaseRepository;
use App\Repositories\InterfaceRepository;
use App\Repositories\UserInterfaceRepository;
use App\Repositories\UserRepository;
use App\Services\BrandServices\BrandService;
use App\Services\BrandServices\InterfaceBrandService;
use App\Services\CategoryServices\CategoryService;
use App\Services\CategoryServices\InterfaceCategoryService;
use App\Services\ChildCategoryServices\ChildCategoryService;
use App\Services\ChildCategoryServices\InterfaceChildCategoryService;
use App\Services\SeoServices\InterfaceSeoService;
use App\Services\SeoServices\SeoService;
use App\Services\SubCategoryServices\InterfaceSubCategoryService;
use App\Services\SubCategoryServices\SubCategoryService;
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
        $this->app->bind(InterfaceSubCategoryRepository::class,SubCategoryRepository::class);
        $this->app->bind(InterfaceSubCategoryService::class,SubCategoryService::class);
        $this->app->bind(InterfaceChildCategory::class,ChildCategoryRepository::class);
        $this->app->bind(InterfaceChildCategoryService::class,ChildCategoryService::class);
        $this->app->bind(InterfaceBrand::class,BrandRepository::class);
        $this->app->bind(InterfaceBrandService::class,BrandService::class);
        $this->app->bind(InterfaceSeo::class,SeoRepository::class);
        $this->app->bind(InterfaceSeoService::class,SeoService::class);

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

