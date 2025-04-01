<?php

namespace App\Providers;

use App\Repositories\Contracts\ProdutoRepositoryInterface;
use App\Repositories\ProdutoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(ProdutoRepositoryInterface::class, ProdutoRepository::class);
    }

    public function boot(): void
    {
        //
    }
}
