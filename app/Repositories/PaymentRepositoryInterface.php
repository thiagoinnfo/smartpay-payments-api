<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    public function store(array $payment);
}