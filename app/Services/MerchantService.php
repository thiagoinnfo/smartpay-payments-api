<?php

namespace App\Services;

use App\Dtos\MerchantDto;
use App\Repositories\MerchantRepositoryInterface;

class MerchantService implements MerchantServiceInterface
{
    public function __construct(
        private readonly MerchantRepositoryInterface $merchantRepositoryInterface
    ){
    }
    public function updateBalance(string $merchantId, float $amount): ?MerchantDto
    {
        return $this->merchantRepositoryInterface->updateBalance($merchantId, $amount);
    }
}