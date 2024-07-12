<?php

namespace Tests\Unit\Dtos;

use App\Dtos\PaymentDto;
use Tests\TestCase;

class PaymentDtoTest extends TestCase
{

    public function testFromArray(): void
    {
        $paymentArray = [
            'id' => '123',
            'name_client' => 'Joseph Salles',
            'cpf' => '12345678901',
            'description' => 'Test payment',
            'payment_method' => 'pix',
            'paid_at' => null,
            'amount' => 100.0,
            'status' => 'pending',
        ];

        $paymentDto = PaymentDto::fromArray($paymentArray);

        $this->assertEquals('123', $paymentDto->id);
        $this->assertEquals('Joseph Salles', $paymentDto->name_client);
        $this->assertEquals('12345678901', $paymentDto->cpf);
        $this->assertEquals('Test payment', $paymentDto->description);
        $this->assertEquals('pix', $paymentDto->payment_method);
        $this->assertNull($paymentDto->paid_at);
        $this->assertEquals(100.0, $paymentDto->amount);
        $this->assertEquals('pending', $paymentDto->status);

    }
}