<?php

namespace App\Enums;
enum FeesType: string
{
    case PIX = 'pix';
    case BANK_SLIP = 'bank_slip';
    case BANK_TRANSFER = 'bank_transfer';

    public function fee(): float
    {
        return match ($this) {
            self::PIX => 1.5,
            self::BANK_SLIP => 2.0,
            self::BANK_TRANSFER => 4.0,
        };
    }

    public static function fromSlug(string $slug): self
    {
        return match ($slug) {
            self::PIX->value => self::PIX,
            self::BANK_SLIP->value => self::BANK_SLIP,
            self::BANK_TRANSFER->value => self::BANK_TRANSFER,
            default => throw new \InvalidArgumentException("Invalid slug provided"),
        };
    }
}


