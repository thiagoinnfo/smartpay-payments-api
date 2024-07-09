<?php

namespace App\Providers;

use App\Repositories\PaymentRepository;
use App\Repositories\PaymentRepositoryInterface;
use App\Services\PaymentService;
use App\Services\PaymentServiceInterface;
use App\Services\ProviderPaymentService;
use App\Services\ProviderPaymentServiceInterface;
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
            ProviderPaymentServiceInterface::class,
            ProviderPaymentService::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
    }
}
