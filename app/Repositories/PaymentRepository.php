<?php

namespace App\Repositories;

use App\Models\Payment;

class PaymentRepository implements PaymentRepositoryInterface
{
    public function store(array $payment)
    {
        return Payment::create($payment);
    }
}