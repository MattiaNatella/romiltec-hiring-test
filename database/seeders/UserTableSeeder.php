<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $newUser = new User();

        $newUser->name = 'Mattia';
        $newUser->email = 'mattianatella@gmail.com';
        $newUser->password = 'mattia1994';
        $newUser->assignRole('admin');
    }
}
;
