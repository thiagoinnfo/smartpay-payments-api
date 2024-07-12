<?php

namespace App\Providers;

use App\Repositories\PaymentRepository;
use App\Repositories\PaymentRepositoryInterface;
use App\Services\PaymentService;
use App\Services\PaymentServiceInterface;
use App\Services\ProviderService;
use App\Services\ProviderServiceInterface;
use App\Services\MerchantServiceInterface;
use App\Services\MerchantService;
use App\Repositories\MerchantRepositoryInterface;
use App\Repositories\MerchantRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            PaymentServiceInterface::class,
            PaymentService::class
        );
        $this->app->bind(
            PaymentRepositoryInterface::class,
            PaymentRepository::class
        );
        $this->app->bind(
            ProviderServiceInterface::class,
            ProviderService::class
        );
        $this->app->bind(
            ProviderServiceInterface::class,
            ProviderService::class
        );
        $this->app->bind(
            MerchantServiceInterface::class,
            MerchantService::class
        );
        $this->app->bind(
            MerchantRepositoryInterface::class,
            MerchantRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
