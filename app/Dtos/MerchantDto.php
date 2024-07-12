<?php

namespace App\Dtos;

class MerchantDto
{
    private string $id;
    private string $name;
    private float $balance;

    public function __construct(
        string $id,
        string $name,
        float $balance
    ){
    }

    public static function fromArray(array $merchant): self
    {
        return new self(
            $merchant['id'],
            $merchant['name'],
            $merchant['balance']
        );
    }
}

