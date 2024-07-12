<?php

namespace App\Services;

use App\Dtos\PaymentDto;

interface PaymentServiceInterface
{
    public function store(array $payment): ?PaymentDto;
    public function getAll(): ?array;
    public function getById(string $id): ?PaymentDto;
    public function updateStatus(string $paymentId, string $status): ?PaymentDto;
}