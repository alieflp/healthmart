<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                $categories = [
            ['name' => 'Masker', 'description' => 'Masker medis dan kain'],
            ['name' => 'Obat-obatan', 'description' => 'Obat bebas dan resep'],
            ['name' => 'Alat Medis', 'description' => 'Stetoskop, termometer, dll'],
            ['name' => 'Vitamin & Suplemen', 'description' => 'Vitamin harian'],
        ];

        foreach ($categories as $cat) {
            Category::create($cat);
        }
    }
}
