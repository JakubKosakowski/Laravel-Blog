<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['name' => 'John', 'email' => 'John.Doe@test.com', 'password' => Hash::make('password')],
            ['name' => 'Jane', 'email' => 'Jane.Doe@test.com', 'password' => Hash::make('password')],
            ['name' => 'Mike', 'email' => 'M.Kubrick@test.com', 'password' => Hash::make('password')]
        ];

        User::insert($data);
    }
}
