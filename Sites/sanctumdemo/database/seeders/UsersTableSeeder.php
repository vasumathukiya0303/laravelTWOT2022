<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sanctumuser')->insert([
            'name' => 'vasu patel',
            'email' => 'vasu@patel333.com',
            'password' => Hash::make('1234567890')
        ]);
    }
}
