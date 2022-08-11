<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id' => User::generateUserid(),
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => Hash::make('11111111'),
                'role_as' => '1'
              ]
        );
    }
}
