<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->email = 'dungshinichi99@gmail.com';
        $user->password = Hash::make('12345678');
        $user->image = 'test.png';
        $user->phone = '0386132297';
        $user->save();
    }
}
