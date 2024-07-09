<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    /**
     * @var string[]
     */
    protected $fillable = [
        'name_client',
        'cpf',
        'description',
        'amount',
        'status',
        'payment_method',
        'transaction_id',
    ];
}
