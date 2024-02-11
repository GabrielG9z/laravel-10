<?php

namespace App\Providers;

use App\Repositories\{SupportEloquentORM};
use App\Repositories\{SupportRepositoryInterface};
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //ONDE TIVER UMA CLASSE ABSTRATA CONVERTA EM UMA CLASSE CONCRETA
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportEloquentORM::class
        );
    }
    

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);
    }
}
