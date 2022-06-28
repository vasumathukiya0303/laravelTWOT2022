<?php

namespace Database\Seeders;

use App\Models\Plan;
use App\Models\People;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Exception;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         try {
             $plan_data = [[
                 'name' => 'night',
                 'price' => '25',
                 'validity' => '6Hours'
             ],
                 [
                     'name' => 'oneDay',
                     'price' => '125',
                     'validity' => '24Hours'
                 ],
                 [
                     'name' => '14Days',
                     'price' => '425',
                     'validity' => '56Hours'
                 ],
                 [
                     'name' => '1month',
                     'price' => '625',
                     'validity' => '84Hours'
                 ],
                 [
                     'name' => '3month',
                     'price' => '999',
                     'validity' => '111Hours'
                 ]];
             DB::table('plans')->insert($plan_data);
             $people_data = [[
                 'name' => 'abc',
                 'company' => 'vodafone',
                 'phone' => '1234567890'
             ],
                 [
                     'name' => 'def',
                     'company' => 'jio',
                     'phone' => '9876543210'
                 ],
                 [
                     'name' => 'hij',
                     'company' => 'idea',
                     'phone' => '1478523690'
                 ],
                 [
                     'name' => 'klm',
                     'company' => 'airtel',
                     'phone' => '3698521470'
                 ],
                 [
                     'name' => 'xyz',
                     'company' => 'docomo',
                     'phone' => '9513268740'
                 ]];

             DB::table('people')->insert($people_data);
         }catch (exception $e){
             report($e);
         }
    }
}
