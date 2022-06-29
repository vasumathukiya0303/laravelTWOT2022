<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class pppSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ppp')->insert([
            'learn'=>Str::random(7),
            'wot'=>Str::random(7).'-WOT',
            'created_at'=>date("Y-m-d H:i:s"),
            'updated_at'=>date("Y-m-d H:i:s"),
            'votes'=>Str::random(1),
            'difficulty'=>Str::random('easy')
        ]);
    }
}
