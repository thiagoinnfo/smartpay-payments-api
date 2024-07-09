<?php

namespace App\Services;

interface PaymentServiceInterface
{
    public function store(array $payment);
}