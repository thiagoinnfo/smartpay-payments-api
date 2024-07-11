<?php

namespace App\Http\Responses;

use App\Dtos\PaymentDto;

class PaymentResponse
{
    public static function fromPaymentDto(PaymentDto $paymentDto): array
    {
        return [
            'id' => $paymentDto->id,
            'name_client' => $paymentDto->name_client,
            'cpf' => $paymentDto->cpf,
            'description' => $paymentDto->description,
            'amount' => $paymentDto->amount,
            'payment_method' => $paymentDto->payment_method,
            'paid_at' => $paymentDto->paid_at?->format('Y-m-d H:i:s'),
            'status' => $paymentDto->status,
        ];
    }
}