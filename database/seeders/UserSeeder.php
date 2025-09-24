<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'username' => 'admin',
            'email' => 'admin@ehealth.com',
            'password' => Hash::make('admin123'),
            'date_of_birth' => '1990-01-01',
            'gender' => 'male',
            'address' => 'Jl. Merdeka No.1',
            'city' => 'Jakarta',
            'contact_no' => '081234567890',
            'paypal_id' => 'admin-paypal@ehealth.com',
            'role' => 'admin',
        ]);

        User::create([
            'username' => 'customer1',
            'email' => 'customer1@mail.com',
            'password' => Hash::make('customer123'),
            'date_of_birth' => '1995-05-10',
            'gender' => 'female',
            'address' => 'Jl. Asia Afrika No.5',
            'city' => 'Bandung',
            'contact_no' => '089876543210',
            'paypal_id' => 'cust1-paypal@mail.com',
            'role' => 'customer',
        ]);
    }
}
