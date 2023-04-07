<?php

namespace Database\Seeders;

use App\Models\Purchase;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PurchaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Purchase::create([
            'receipt_number' => '123456789',
            'date_buy' => '2021-04-07 21:08:33',
            'quantity_buy' => 10,
            'distributor_id' => 1,
            'user_id' => 1,
        ]);
    }
}
