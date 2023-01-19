<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
                'name'	=> 'staff',
                'email'	=> 'staff@agenx.com',
                'password'	=> bcrypt('staff'),
                'role' => 'staff',
                'remember_token' => Str::random(60),
        ];
        
        \DB::table('users')->insert($user);
    }
}
