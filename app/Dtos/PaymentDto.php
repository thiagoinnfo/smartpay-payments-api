<?php

namespace App\Dtos;

class PaymentDto
{
    public ?string $id;
    public string $name_client;
    public string $cpf;
    public string $description;
    public float $amount;
    public string $status;
    public string $payment_method;
    public ?\DateTimeInterface $paid_at;
    public function __construct(
        ?int $id,
        string $name_client,
        string $cpf,
        string $description,
        float $amount,
        string $status,
        string $payment_method,
       ?\DateTimeInterface $paid_at = null
    ) {}

    public static function fromArray(array $payment): self
    {
        return new self(
            $payment['id'] ?? null,
            $payment['name_client'],
            $payment['cpf'],
            $payment['description'] ?? null,
            $payment['amount'],
            $payment['status'],
            $payment['payment_method'],
            $payment['paid_at'] ?? null
        );
    }
}