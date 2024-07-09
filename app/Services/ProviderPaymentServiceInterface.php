<?php

namespace App\Services;

interface ProviderPaymentServiceInterface
{
    public function execute(): string;
}