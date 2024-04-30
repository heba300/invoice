<?php

namespace App\Providers;

use App\Models\Invoice;
use App\Models\Product;
use App\Models\Section;
use App\Models\User;
use App\Repositories\Auth\AuthEloquentRepository;
use App\Repositories\Auth\AuthRepository;
use App\Repositories\Invoices\InvoiceEloquentRepository;
use App\Repositories\Invoices\InvoiceRepository;
use App\Repositories\Products\ProductEloquentRepository;
use App\Repositories\Products\ProductRepository;
use App\Repositories\Sections\SectionEloquentRepository;
use App\Repositories\Sections\SectionRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->bind(AuthRepository::class, function () {
            return new AuthEloquentRepository(new User());
        });

        $this->app->bind(SectionRepository::class, function () {
            return new SectionEloquentRepository(new Section());
        });

        $this->app->bind(ProductRepository::class, function () {
            return new ProductEloquentRepository(new Product());
        });

        $this->app->bind(InvoiceRepository::class, function () {
            return new InvoiceEloquentRepository(new Invoice());
        });
    }
}
