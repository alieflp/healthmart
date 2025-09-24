<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'category_id' => 1,
                'name' => 'Masker Medis 3 Ply',
                'description' => 'Masker sekali pakai 3 lapis untuk perlindungan ekstra',
                'price' => 50000,
                'stock' => 200,
                'image' => 'masker.jpg'
            ],
            [
                'category_id' => 2,
                'name' => 'Paracetamol 500mg',
                'description' => 'Obat pereda sakit kepala dan demam',
                'price' => 15000,
                'stock' => 100,
                'image' => 'paracetamol.jpg'
            ],
            [
                'category_id' => 3,
                'name' => 'Termometer Digital',
                'description' => 'Pengukur suhu tubuh digital dengan akurasi tinggi',
                'price' => 80000,
                'stock' => 50,
                'image' => 'termometer.jpg'
            ],
            [
                'category_id' => 4,
                'name' => 'Vitamin C 1000mg',
                'description' => 'Suplemen Vitamin C untuk daya tahan tubuh',
                'price' => 60000,
                'stock' => 150,
                'image' => 'vitaminc.jpg'
            ],
        ];

        foreach ($products as $prod) {
            Product::create($prod);
        }
    }
}
