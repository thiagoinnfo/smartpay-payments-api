<?php

namespace App\Services;

use App\Repositories\PaymentRepositoryInterface;

class PaymentService implements PaymentServiceInterface
{
    public function __construct(
        private readonly PaymentRepositoryInterface $paymentRepositoryInterface
    ){
    }
    public function store(array $payment)
    {
        return $this->paymentRepositoryInterface->store($payment);
    }
}