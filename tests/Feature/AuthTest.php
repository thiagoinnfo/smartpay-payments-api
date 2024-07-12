<?php

namespace Feature;

use Tests\TestCase;

class AuthTest extends TestCase
{

    public function testLogin(): void
    {
        $response = $this->postJson('/api/login', [
            'email' => 'merchant1@example.com',
            'password' => '123456',
        ], [
            'Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'authorization' => [
                'token'
            ]
        ]);
    }
}