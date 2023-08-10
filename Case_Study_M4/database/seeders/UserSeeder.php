<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'hieu';
        $user->email = 'hieu123@gmail.com';
        $user->password = Hash::make('111111');
        $user->birthday = '2002/01/19';
        $user->address = 'Linh Chiểu';
        $user->image = '1jCVdawgaYEAN8g7RCOxHH1mkA9IJcixSfQlmkNk.png';
        $user->phone = '0358674420';
        $user->gender = 'Nam';
        $user->group_id = '2';
        $user->save();
    }
}