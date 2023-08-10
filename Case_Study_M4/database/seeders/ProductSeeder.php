<?php

namespace Database\Seeders;

// use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'name' => 'Áo sơmi',
                'price' => 340000,
                'amount' => 2,
                'category_id' => 1,
                'description' => 'hihii',
                'image' => 'anh',
                'created_at' => '2023-06-14 14:07:10',
            ],
        ]);
    }
}
