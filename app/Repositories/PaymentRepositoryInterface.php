<?php

namespace App\Repositories;

use App\Dtos\PaymentDto;

interface PaymentRepositoryInterface
{
    public function store(array $payment): ?PaymentDto;

    public function getAll(): ?array;

    public function getById(string $id): ?PaymentDto;
    public function updateStatus(string $paymentId, string $status): ?PaymentDto;
}