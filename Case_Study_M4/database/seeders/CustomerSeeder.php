<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('customers')->insert([
            [
                'name' => 'Trần Đình Hiếu',
                'email' => 'Hieu@gmail.com',
                'gender' => 'nam',
                'phone' => '12234567890',
                'address' => 'Dubai',
                'image' => 'anh',
                'password' => bcrypt('123456')
                
            ],
          
        ]);
    }
}
