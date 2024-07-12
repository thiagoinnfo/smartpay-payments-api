<?php

namespace App\Services;

use App\Dtos\MerchantDto;

interface MerchantServiceInterface
{
    public function updateBalance(string $merchantId, float $amount): ?MerchantDto;
}