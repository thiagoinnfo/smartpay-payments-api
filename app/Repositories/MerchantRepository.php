<?php

namespace App\Repositories;

use App\Dtos\MerchantDto;
use App\Models\Merchant;

class MerchantRepository implements MerchantRepositoryInterface
{
    public function updateBalance(string $merchantId, float $amount): ?MerchantDto
    {
        $merchant = Merchant::find($merchantId);
        if (!$merchant) {
            return null;
        }

        $merchant->balance += $amount;
        $merchant->save();

        return MerchantDto::fromArray($merchant->toArray());
    }
}