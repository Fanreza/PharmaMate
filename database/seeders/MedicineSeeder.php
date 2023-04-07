<?php

namespace Database\Seeders;

use App\Models\Medicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Medicine::create([
            'code' => '0000000000001',
            'name' => 'Paracetamol',
            'brand' => 'Paracetamol',
            'type' => 'Tablet',
            'unit' => 'Strip',
            'group' => 'Analgesic',
            'packaging' => '10 Tablets',
            'price' => 10.00,
            'quantity' => 100,
        ]);
    }
}
