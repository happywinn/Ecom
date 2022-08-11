<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CouponsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coupons')->insert(
            [
                'code' => 'ddd321',
                'type' => 'fixed',
                'value' => '15000',
                'users' => 'mimi@gmail.com,sutaung@gmail.com',
                'expiry_date' => '2022-08-01',
                'status' => 1
              ]
        );
    }
}
