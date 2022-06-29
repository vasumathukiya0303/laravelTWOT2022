<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Land;
use App\Models\Contact;

class LandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Land::create([
            'name'=>'admin',
            'email'=>'admin345@yahoo.com',
            'password'=>bcrypt('password')
        ]);
        Contact::create([
            'user_id'=>1,
            'address'=>'Navrangpura, Ahemdabad',
            'phone'=>'1234567890'
        ]);
    }
}
