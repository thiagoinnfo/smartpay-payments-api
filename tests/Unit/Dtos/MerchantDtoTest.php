<?php

namespace Tests\Unit\Dtos;

use App\Dtos\MerchantDto;
use Tests\TestCase;

class MerchantDtoTest extends TestCase
{

    public function testFromArray(): void
    {
        $merchantArray = [
            'id' => '123',
            'name' => 'Test Merchant',
            'balance' => 1000.0,
        ];

        $merchantDto = MerchantDto::fromArray($merchantArray);

        $this->assertEquals('123', $merchantDto->id);
        $this->assertEquals('Test Merchant', $merchantDto->name);
        $this->assertEquals(1000.0, $merchantDto->balance);
    }
}