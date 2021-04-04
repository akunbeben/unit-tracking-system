<?php

namespace App\Providers;

use App\Repositories\Eloquent\BaseRepository;
use App\Repositories\Eloquent\OwnerRepository;
use App\Repositories\Eloquent\UnitRepository;
use App\Repositories\Interfaces\IBaseRepository;
use App\Repositories\Interfaces\IOwnerRepository;
use App\Repositories\Interfaces\IUnitRepository;
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
        $this->app->bind(IBaseRepository::class, BaseRepository::class);
        $this->app->bind(IUnitRepository::class, UnitRepository::class);
        $this->app->bind(IOwnerRepository::class, OwnerRepository::class);
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
