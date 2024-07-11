<?php

namespace App\Dtos;

class PaymentDto
{
    public ?string $id;
    public string $name_client;
    public string $cpf;
    public ?string $description;
    public float $amount;
    public string $status;
    public string $payment_method;
    public ?\DateTimeInterface $paid_at;

    public function __construct(
        ?string $id,
        string $name_client,
        string $cpf,
        ?string $description,
        float $amount,
        string $status,
        string $payment_method,
        ?\DateTimeInterface $paid_at = null
    ) {
        $this->id = $id;
        $this->name_client = $name_client;
        $this->cpf = $cpf;
        $this->description = $description;
        $this->amount = $amount;
        $this->status = $status;
        $this->payment_method = $payment_method;
        $this->paid_at = $paid_at;
    }

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
            isset($payment['paid_at']) ? new \DateTime($payment['paid_at']) : null
        );
    }
}

