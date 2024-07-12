<?php

namespace App\Repositories;

use App\Dtos\MerchantDto;

interface MerchantRepositoryInterface
{
    public function updateBalance(string $merchantId, float $amount): ?MerchantDto;
}