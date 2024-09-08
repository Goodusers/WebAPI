<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\GameRepository;
use App\Repositories\Interfaces\GameRepositoryInterface;

use App\Repositories\GenreRepository;
use App\Repositories\Interfaces\GenreRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register()
    {
        $this->app->bind(GameRepositoryInterface::class, GameRepository::class);
        $this->app->bind(GenreRepositoryInterface::class, GenreRepository::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
