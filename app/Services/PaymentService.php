<?php

namespace App\Services;

use App\Dtos\PaymentDto;
use App\Repositories\PaymentRepositoryInterface;

class PaymentService implements PaymentServiceInterface
{
    public function __construct(
        private readonly PaymentRepositoryInterface $paymentRepositoryInterface
    ){
    }
    public function store(array $payment): ?PaymentDto
    {
        return $this->paymentRepositoryInterface->store($payment);
    }

    public function getAll(): ?array
    {
        return $this->paymentRepositoryInterface->getAll();
    }

    public function getById(string $id): ?PaymentDto
    {
        return $this->paymentRepositoryInterface->getById($id);
    }
}