<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        user::create([
            'firstName' => 'Marcos',
            'lastName' => 'Levi',
            'email' => 'contato@marcosle.com',
            'password' => bcrypt('12345'),
        ]);
    }
}
