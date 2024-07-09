<?php

namespace App\Repositories;

use App\Dtos\PaymentDto;
use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function store(array $payment): ?PaymentDto
    {
        $payment = Payment::create($payment);
        if(!$payment){
            return null;
        }
        return PaymentDto::fromArray($payment->toArray());
    }

    public function getAll(): ?array
    {
        return Payment::all()?->toArray();
    }

    public function getById(string $id): ?PaymentDto
    {
        $payment = Payment::find($id);
        if(!$payment){
            return null;
        }
        return PaymentDto::fromArray($payment->toArray());
    }
}