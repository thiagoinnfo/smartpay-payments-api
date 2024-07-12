<?php

namespace Feature;

use Tests\TestCase;

class PaymentTest extends TestCase
{
    private string $token;

    public function setUp(): void
    {
        parent::setUp();

        $loginResponse = $this->postJson('/api/login', [
            'email' => 'merchant1@example.com',
            'password' => '123456',
        ], [
            'Accept' => 'application/json'
        ]);

        $content = json_decode($loginResponse->getContent());
        $this->token = $content->authorization->token;
    }

    public function testStore(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson('/api/payments', [
            'name_client' => 'Joseph Salles',
            'cpf' => '12345678901',
            'description' => 'Test payment',
            'amount' => 100.0,
            'payment_method' => 'pix'
        ]);

        $response->assertStatus($response->getStatusCode());
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name_client',
                'cpf',
                'description',
                'amount',
                'payment_method',
                'paid_at',
                'status'
            ]
        ]);
    }

    public function testIndex(): void
    {
        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ])->getJson('/api/payments');

        $response->assertStatus($response->getStatusCode());
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'id',
                    'name_client',
                    'cpf',
                    'description',
                    'amount',
                    'payment_method',
                    'paid_at',
                    'status'
                ]
            ]
        ]);
    }

    public function testShow(): void
    {
        $paymentResponse = $this->withHeaders([
            'Authorization' => 'Bearer ' . $this->token,
        ])->postJson('/api/payments', [
            'name_client' => 'Joseph Salles',
            'cpf' => '12345678901',
            'description' => 'Test payment',
            'amount' => 100.0,
            'payment_method' => 'pix'
        ]);

        $payment = json_decode($paymentResponse->getContent());

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '. $this->token,
        ])->getJson('/api/payments/' . $payment->data->id);

        $response->assertStatus($response->getStatusCode());
        $response->assertJsonStructure([
            'data' => [
                'id',
                'name_client',
                'cpf',
                'description',
                'amount',
                'payment_method',
                'paid_at',
                'status'
            ]
        ]);
    }
}