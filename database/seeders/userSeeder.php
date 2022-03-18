<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Str;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        User::insert([
            [
            'name' => 'admin',
            'role' => 'admin',
            'email' => 'admin@laundry.com',
            'password' => bcrypt('12345'),
            'remember_token' => Str::random(60),
            ],
            [
                'name' => 'gibran',
                'role' => 'kasir',
                'email' => 'gibran@kasir.com',
                'password' => bcrypt('12345'),
                'remember_token' => Str::random(60),
            ]
        ]);
    }
}
