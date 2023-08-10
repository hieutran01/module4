<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpendingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spendings')->insert([
            [
                'danhmuc' => 'phone',
                'ngay' => '2023-06-14',
                'sotien' => '340000.00',
                'created_at' => '2023-06-14 14:07:10',
            ],
        ]);
    }
}
