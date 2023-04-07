<?php

namespace Database\Seeders;

use App\Models\Sale;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Sale::create([
            'receipt_number' => '0000000001',
            'date_sale' => '2021-04-07 22:13:16',
            'quantity_sale' => '1',
            'user_id' => 1,
        ]);
    }
}
