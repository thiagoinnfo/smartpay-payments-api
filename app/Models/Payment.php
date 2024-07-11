<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * KeyType
     * @var string
     */
    protected $keyType = 'string';
    /**
     * Incrementing
     * @var bool
     */
    public $incrementing = false;

    /**
     * Casts
     * @var string[]
     */
    protected $casts = [
        'id' => 'string',
        'paid_at' => 'datetime',
    ];

    /**
     * @var string[]
     */
    protected $fillable = [
        'id',
        'name_client',
        'cpf',
        'description',
        'amount',
        'status',
        'payment_method',
    ];
}
