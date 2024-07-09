<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PaymentMethodsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('payment_methods')->insert(
            [
                [
                'id' => '1',
                'name' => 'Pix',
                'slug' => 'pix',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'id' => '2',
                'name' => 'Bank Slip',
                'slug' => 'bank_slip',
                'created_at' => now(),
                'updated_at' => now(),
                ],
                [
                'id' => '3',
                'name' => 'Bank Transfer',
                'slug' => 'bank_transfer',
                'created_at' => now(),
                'updated_at' => now(),
                ]
            ]
        );
    }
}
