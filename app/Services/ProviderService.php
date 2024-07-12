<?php

namespace App\Services;

class ProviderService implements ProviderServiceInterface
{
    public function execute(): bool
    {
        $rand = random_int(1, 100);

        if ($rand <= 70) {
            return true;
        }

        return false;
    }
}