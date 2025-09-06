<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Company\CompanyRepository, App\Repositories\Company\EloquentCompany;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(CompanyRepository::class, EloquentCompany::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
