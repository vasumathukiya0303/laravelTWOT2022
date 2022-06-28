<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class treeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::table('tree')->insert([
                'name'=>Str::random(7),
                'email'=>Str::random(7).'@WOTgmail.com',
                'address'=>Str::random(7).',amd.'
            ]);
        }catch (\Exception $e){
            Log::error(' Error message :'.$e->getMessage());
        }

    }
}
