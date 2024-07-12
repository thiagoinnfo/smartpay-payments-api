<?php

namespace Tests\Unit\Enums;

use App\Enums\FeesType;
use Tests\TestCase;

class FeesTypeTest extends TestCase
{
    public function testFeesValue(): void
    {
        $this->assertEquals('bank_slip', FeesType::BANK_SLIP->value);
        $this->assertEquals('pix', FeesType::PIX->value);
        $this->assertEquals('bank_transfer', FeesType::BANK_TRANSFER->value);
    }

    public function testFee(): void
    {
        $this->assertEquals(2.0, FeesType::BANK_SLIP->fee());
        $this->assertEquals(1.5, FeesType::PIX->fee());
        $this->assertEquals(4.0, FeesType::BANK_TRANSFER->fee());
    }

    public function testFromSlug(): void
    {
        $this->assertEquals(FeesType::BANK_SLIP, FeesType::fromSlug('bank_slip'));
        $this->assertEquals(FeesType::PIX, FeesType::fromSlug('pix'));
        $this->assertEquals(FeesType::BANK_TRANSFER, FeesType::fromSlug('bank_transfer'));
        $this->expectException(\InvalidArgumentException::class);
        FeesType::fromSlug('invalid_slug');
    }
}