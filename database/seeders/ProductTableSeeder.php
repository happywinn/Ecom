<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        DB::table('products')->insert(
            [
                'cate_id' => 'DEF456',
                'name' => 'percent',
                'type' => '50',
                'small_description' => '50',
                'description' => '50',
                'original_price' => '50',
                'selling_price' => '50',
                'image' => '50',
                'qty' => '50',
                'tax' => '50',
                'status' => '50',
                'trending' => '50',
                'new_arrival' => '50',
                'meta_title' => '50',
                'meta_keywords' => '50',
                'meta_description' => '50',
              ]
        );
    }
}
