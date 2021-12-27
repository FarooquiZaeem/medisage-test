<?php

namespace App\Providers;

use App\Repositories\Country\CountryInterface;
use App\Repositories\Country\Implementations\CountryRepository;
use App\Repositories\Student\Implementations\StudentRepository;
use App\Repositories\Student\StudentInterface;
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
        $this->app->bind(StudentInterface::class, StudentRepository::class);
        $this->app->bind(CountryInterface::class, CountryRepository::class);
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
