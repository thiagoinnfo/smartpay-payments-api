<?php

namespace App\Dtos;

class MerchantDto
{
    public string $id;
    public string $name;
    public float $balance;

    public function __construct(
        string $id,
        string $name,
        float $balance
    ){
        $this->id = $id;
        $this->name = $name;
        $this->balance = $balance;
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

