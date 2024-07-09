<?php

namespace App\Services;

class ProviderPaymentService implements ProviderPaymentServiceInterface
{
    public function execute(): string
    {
        $rand = rand(1, 100);

        if ($rand <= 70) {
            return 'success';
        } else {
            return 'error';
        }
    }
}